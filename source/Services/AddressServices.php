<?php

namespace Source\Services;

use Source\Models\Address;

class AddressServices {
    public function store($data)
    {
        $address = new Address();

        //Informando dado a dado pois é muito valido informar todos os campos por segurança
        $address->bootstrap(
           $data["client"],
           $data["street"],
           $data["number"],
           $data["complement"],
           $data["code"],
           $data["neighborhood"],
           $data["city"],
           $data["uf"]
        );

        //Efetuando o registro
        if ($address->save($address)) {
            $json['redirect'] = url("/enderecos");
        } else {
            $json['message'] = $address->message()->render();
        }

        return $json;
    }

    public static function update($data)
    {
    
        $address = (new Address())->findById($data["id"]);

        //Informando dado a dado pois é muito valido informar todos os campos por segurança
        $address->bootstrap(
           $data["client"],
           $data["street"],
           $data["number"],
           $data["complement"],
           $data["code"],
           $data["neighborhood"],
           $data["city"],
           $data["uf"]
        );

        //Efetuando o registro
        if ($address->save($address)) {
            $json['redirect'] = url("/enderecos");
        } else {
            $json['message'] = $address->message()->render();
        }

        return $json;
    }
}
