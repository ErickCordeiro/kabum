<?php

namespace Source\Models;

use Source\Core\Model;

class Client extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "clients", ["id"], ["name", "document", "birthday", "rg", "phone"]
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
        string $name,
        string $document,
        string $rg,
        string $phone,
        string $birthday,
    ): Client
    {
        $this->name = $name;
        $this->rg = $rg;
        $this->birthday = $birthday;
        $this->document = $document;
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param string $email
     * @param string $columns
     * @return null|Client
     */
    public function findByDocument(string $document, string $columns = "*"): ?Client
    {
        $find = $this->find("document = :document", "document={$document}", $columns);
        return $find->fetch();
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome, sobrenome, email e senha são obrigatórios");
            return false;
        }

        if (!is_document($this->document)) {
            $this->message->warning("O CPF informado não tem um formato válido ou inválido");
            return false;
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("document = :e AND id != :i", "e={$this->document}&i={$userId}", "id")->fetch()) {
                $this->message->warning("O CPF informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->findByDocument($this->document, "id")) {
                $this->message->warning("O CPF informado já está cadastrado");
                return false;
            }

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

    public function address(): ?Address
    {
        if ($this->id) {
            return (new Address())->find("client_id={$this->id}")->fetch();            
        }

        return null;
    }
}