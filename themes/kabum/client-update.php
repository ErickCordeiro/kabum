<?php $this->layout("_theme"); ?>

<div class="row pb-3 justify-between">
    <div class="col-md-6">
        <h2>Atualizar de Cliente</h2>
    </div>
</div>

<form action="<?= url("/cliente/update/{$client->id}") ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="update" value="true">
    <?= csrf_input() ?>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="<?= $client->name?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">CPF</label>
        <div class="col-sm-10">
            <input type="text" name="document" class="form-control" maxlength="11"  value="<?= $client->document?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">RG</label>
        <div class="col-sm-10">
            <input type="text" name="rg" class="form-control" maxlength="15"  value="<?= $client->rg?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Data Nasc.</label>
        <div class="col-sm-10">
            <input type="date" name="birthday" class="form-control"  value="<?= $client->birthday?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Telefone</label>
        <div class="col-sm-10">
            <input type="text" maxlength="15" name="phone" class="form-control"  value="<?= $client->phone?>">
        </div>
    </div>

    <div class="mt-5row">
        <div class="col-md-2">
            <button class="btn-green btn-small btn"> Cadastrar</button>
        </div>
    </div>


</form>