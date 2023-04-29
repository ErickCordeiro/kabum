<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Client;
use Source\Services\ClientServices;

class ClientController extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");

        if (!Auth::user()) {
            redirect("/entrar");
        }
    }

    public function create(?array $data)
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

            $client = new ClientServices();
            $json = $client->store($data);
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Dashboard - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/"),
            theme("/assets/images/shared.png")
        );

        echo $this->view->render("client-create", [
            "head" => $head
        ]);
    }

    public function edit ($id) 
    {

        $client = (new Client())->findById(intval($id));

        $head = $this->seo->render(
            "Dashboard - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/"),
            theme("/assets/images/shared.png")
        );

        echo $this->view->render("client-update", [
            "head" => $head,
            "client" => $client
        ]);
    }

    public function update(?array $data)
    {   

        if (!empty($data['update'])) {
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

                $client = new ClientServices();
                $json = $client->update($data);
                echo json_encode($json);
                return;
            }
        }

        $json["message"] = $this->message->warning("Problemas na atualização do cadastro")->render();
        echo json_encode($json);
        return;
    }

    /**
     * @param array $data
     */
    public function destroy(array $data): void
    {
        $client = (new Client())->find(
            "id = :id",
            "id={$data["id"]}"
        )->fetch();

        if ($client) {
            $client->destroy();
        }

        $json["message"] = $this->message->success('Registro excluido com sucesso')->flash();
        $json["redirect"] = url("/");
        echo json_encode($json);
        return;
    }
}
