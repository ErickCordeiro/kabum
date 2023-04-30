<?php $this->layout("_theme"); ?>

<div class="row pb-3 justify-between">
    <div class="col-md-6">
        <h2>Listagem de Endereços</h2>
    </div>
    <div class="col-md-6 text-center">
        <a href="<?= url("/enderecos/novo") ?>" class="icon-plus btn btn-green">Adicionar Endereço</a>
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
                <th scope="col">Endereço</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">UF</th>
                <th scope="col">Cliente</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($addresses) : ?>
                <?php foreach ($addresses as $item) : ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= "{$item->street}, {$item->number}" ?></td>
                        <td><?= $item->neighborhood ?></td>
                        <td><?= $item->city ?></td>
                        <td><?= $item->uf ?></td>
                        <td><?= $item->client()->name ?></td>
                        <td>
                            <a href="<?= url("/enderecos/editar/{$item->id}") ?>"><span class="icon-notext icon-pencil btn btn-small bg-primary"></span></a>
                            <span data-remove="<?= url("/enderecos/delete/{$item->id}") ?>"
                                      class="btn btn-small btn-red icon-notext icon-trash radius"></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>