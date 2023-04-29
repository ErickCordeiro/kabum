<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;

/**
 * Class Web
 * @package Source\App
 */
class WebController extends Controller
{
    /** @var $user */
    private $user;

    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");

        if(!Auth::user()){
            redirect("/entrar");
        }

        $this->user = Auth::user();
    }

    public function home(){
        
        $head = $this->seo->render(
            "Dashboard - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/"),
            theme("/assets/images/shared.png")
        );

        echo $this->view->render("home", [
            "head" => $head,
        ]);
    }


    /**
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está disponível, Já estamos vendo isso mas caso precise, envie-nos um e-mail :)";
                $error->linkTitle = "Enviar E-mail!";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indiponivel :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponivel no momento ou foi removido!";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                break;
        }


        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            theme("/assets/images/shared.png"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error,
        ]);
    }
}
