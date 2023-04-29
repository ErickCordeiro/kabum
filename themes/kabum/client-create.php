<?php $this->layout("_theme"); ?>

<div class="row pb-3 justify-between">
    <div class="col-md-6">
        <h2>Cadastro de Cliente</h2>
    </div>
</div>

<form action="<?= url("/cliente") ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_input() ?>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">CPF</label>
        <div class="col-sm-10">
            <input type="text" name="document" class="form-control" maxlength="11">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">RG</label>
        <div class="col-sm-10">
            <input type="text" name="rg" class="form-control" maxlength="15">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Data Nasc.</label>
        <div class="col-sm-10">
            <input type="date" name="birthday" class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Telefone</label>
        <div class="col-sm-10">
            <input type="text" maxlength="15" name="phone" class="form-control">
        </div>
    </div>

    <div class="mt-5row">
        <div class="col-md-2">
            <button class="btn-green btn-small btn"> Cadastrar</button>
        </div>
    </div>


</form>