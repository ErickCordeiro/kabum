<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Address;
use Source\Models\Auth;
use Source\Models\Client;
use Source\Services\AddressServices;

class AddressesController extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");

        if (!Auth::user()) {
            redirect("/entrar");
        }
    }

    public function index() {
        $head = $this->seo->render(
            "Dashboard - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/"),
            theme("/assets/images/shared.png")
        );

        echo $this->view->render("addresses", [
            "head" => $head,
            "addresses" => (new Address())->find()->fetch(true),
        ]);
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

            $addresses = new AddressServices();
            $json = $addresses->store($data);
            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Dashboard - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/"),
            theme("/assets/images/shared.png")
        );

        echo $this->view->render("addresses-create", [
            "head" => $head,
            "clients" => (new Client())->find()->fetch(true)
        ]);
    }

    public function edit ($data) 
    {

        $address = (new Address())->find("id=:id", "id={$data["id"]}")->fetch();

        $head = $this->seo->render(
            "Dashboard - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/"),
            theme("/assets/images/shared.png")
        );

        echo $this->view->render("addresses-update", [
            "head" => $head,
            "address" => $address,
            "clients" => (new Client())->find()->fetch(true)
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

                $address = new AddressServices();
                $json = $address->update($data);
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
        $address = (new Address())->find(
            "id = :id",
            "id={$data["id"]}"
        )->fetch();

        if ($address) {
            $address->destroy();
        }

        $json["message"] = $this->message->success('Registro excluido com sucesso')->flash();
        $json["redirect"] = url("/enderecos");
        echo json_encode($json);
        return;
    }
}
