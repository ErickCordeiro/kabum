<?php 

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\User;
use Source\Support\Message;

class AuthController extends Controller {

    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function login(?array $data): void
    {

        if(Auth::user()){
            redirect('/');
        }

        if (!empty($data['csrf'])) {

            //Verificando se o csrf é valido ou não
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor user o formulário")->render();
                echo json_encode($json);
                return;
            }

            //Verificando o limite
            if (request_limit("weblogin", 10, 60 * 5)) {
                $json['message'] = $this->message->error("Você já efetuou 3 tentativas, esse é o limite. Por favor aguarde por 5 minutos para tentar novamente!")->render();
                echo json_encode($json);
                return;
            }

            if (empty($data['email']) || empty($data['password'])) {
                $json['message'] = $this->message->warning("Informe seu e-mail ou senha para entrar")->render();
                echo json_encode($json);
                return;
            }

            $save = (!empty($data['save']) ? true : false);
            $auth = new Auth();
            $login = $auth->login($data['email'], $data['password'], $save);

            if ($login) {
                $json['redirect'] = url('/');
            } else {
                $json['message'] = $auth->message()->render();
            }


            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Entrar - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/entrar"),
            theme("/assets/images/shared.png")
        );
        echo $this->view->render("auth-login", [
            "head" => $head,
            "cookie" => filter_input(INPUT_COOKIE, "authEmail"),
        ]);
    }

    /**
     * Auth Register
     * @param null|array $data
     */
    public function register(?array $data): void
    {
        // Verificando se existe o campo CSRF;
        if (!empty($data['csrf'])) {

            //Verificando se o csrf é valido ou não
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor user o formulário")->render();
                echo json_encode($json);
                return;
            }

            //Verificando se não existe campos vazio.
            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Informe seus dados para criar sua conta.")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            $user = new User();

            //Informando dado a dado pois é muito valido informar todos os campos por segurança
            $user->bootstrap(
                $data["first_name"],
                $data["last_name"],
                $data["email"],
                $data["password"]
            );

            //Efetuando o registro
            if ($auth->register($user)) {
                $json['redirect'] = url("/entrar");
            } else {
                $json['message'] = $auth->message()->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Cadastrar - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/cadastrar"),
            theme("/assets/images/shared.png")
        );
        echo $this->view->render("auth-register", [
            "head" => $head,
        ]);
    }

    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->first_name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }
}