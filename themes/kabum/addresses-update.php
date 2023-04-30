<?php $this->layout("_theme"); ?>

<div class="row pb-3 justify-between">
    <div class="col-md-6">
        <h2>Cadastro de Endereço</h2>
    </div>
</div>

<form action="<?= url("/enderecos/update/{$address->id}") ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_input() ?>
    <input type="hidden" name="update" value="true">
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Cliente</label>
        <div class="col-sm-10">
            <select name="client" class="form-control" required>
                <option value="">Selecione um cliente</option>
                <?php if ($clients) : ?>
                    <?php foreach ($clients as $item) : ?>
                        <option <?= ($item->id === $address->client_id) ? "selected" : ""; ?> value="<?= $item->id ?>"><?= $item->name ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Endereço</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="street" value="<?= $address->street ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nº</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="number" value="<?= $address->number ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Complemento</label>
        <div class="col-sm-10">
            <input type="text" name="complement" class="form-control" value="<?= $address->complement ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Cidade</label>
        <div class="col-sm-10">
            <input type="text" name="city" class="form-control" value="<?= $address->city ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Bairro</label>
        <div class="col-sm-10">
            <input type="text" name="neighborhood" class="form-control" value="<?= $address->neighborhood ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">CEP</label>
        <div class="col-sm-10">
            <input type="text" name="code" class="form-control" maxlength="8" value="<?= $address->code ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Estado</label>
        <div class="col-sm-10">
            <input type="text" name="uf" class="form-control" value="<?= $address->uf ?>">
        </div>
    </div>

    <div class="mt-5row">
        <div class="col-md-2">
            <button class="btn-green btn-small btn"> Cadastrar</button>
        </div>
    </div>


</form>