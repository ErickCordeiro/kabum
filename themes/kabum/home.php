<?php $this->layout("_theme"); ?>

<div class="row pb-3 justify-between">
    <div class="col-md-6">
        <h2>Listagem de Cliente</h2>
    </div>
    <div class="col-md-6 text-center">
        <a href="<?= url("/cliente") ?>" class="icon-plus btn btn-green">Adicionar Cliente</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="ajax_response"><?= flash() ?></div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data Nasc.</th>
                <th scope="col">Telefone</th>
                <th scope="col">CPF</th>
                <th scope="col">RG</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($clients) : ?>
                <?php foreach ($clients as $item) : ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= date_fmt($item->birthday, "d/m/Y") ?></td>
                        <td><?= $item->phone ?></td>
                        <td><?= $item->document ?></td>
                        <td><?= $item->rg ?></td>
                        <td>
                            <a href="<?= url("/cliente/editar/{$item->id}") ?>"><span class="icon-notext icon-pencil btn btn-small bg-primary"></span></a>
                            <span data-remove="<?= url("/cliente/delete/{$item->id}") ?>"
                                      class="btn btn-small btn-red icon-notext icon-trash radius"></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>