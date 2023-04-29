<?php

namespace Source\Services;

use Source\Models\Client;

class ClientServices {
    public function store($data)
    {
        $client = new Client();

        //Informando dado a dado pois é muito valido informar todos os campos por segurança
        $client->bootstrap(
            $data["name"],
            $data["document"],
            $data["rg"],
            $data["phone"],
            $data["birthday"]
        );

        //Efetuando o registro
        if ($client->save($client)) {
            $json['redirect'] = url("/");
        } else {
            $json['message'] = $client->message()->render();
        }

        return $json;
    }

    public static function update($data)
    {
    
        $client = (new Client())->findByDocument($data['document']);

        //Informando dado a dado pois é muito valido informar todos os campos por segurança
        $client->bootstrap(
            $data["name"],
            $data["document"],
            $data["rg"],
            $data["phone"],
            $data["birthday"]
        );

        //Efetuando o registro
        if ($client->save($client)) {
            $json['redirect'] = url("/");
        } else {
            $json['message'] = $client->message()->render();
        }

        return $json;
    }
}
