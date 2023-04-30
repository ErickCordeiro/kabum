<?php

namespace Source\Models;

use Source\Core\Model;

class Address extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "addresses", ["id"], ["client_id", "street", "number", "complement", "code", "neighborhood", "city", "uf"]
        );
    }


    /**
     * @param string $name
     * @param string $rg
     * @param string $birthday
     * @param string $rg
     * @param string $phone
     * @param string|null $document
     * @return User
     */
    public function bootstrap(
        int $client_id,
        string $street,
        string $number,
        string $complement,
        string $code,
        string $neighborhood,
        string $city,
        string $uf,
    ): Address
    {
        $this->client_id = $client_id;
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        $this->code = $code;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->uf = $uf;
        return $this;
    }

   
    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Todos os campos são obrigatórios são obrigatórios");
            return false;
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
        
            $userId = $this->create($this->safe());
            if ($this->fail()) {
                var_dump($this->fail());die();
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($userId))->data();
        return true;
    }

    public function client(): ?Client
    {
        if ($this->client_id) {
            return (new Client())->findById($this->client_id); 
        }

        return null;
    }
}