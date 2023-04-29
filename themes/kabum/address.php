<?php $this->layout("_theme"); ?>
<main class="main_content">
    <div class="container main_account">
        <nav class="main_account_sidebar">
            <a class="radius transition" href="<?= url("/conta") ?>" title="Meus Pedidos">Meus Pedidos</a>
            <a class="radius transition" href="<?= url("/conta/cadastro") ?>" title="Meus Dados">Meus Dados</a>
            <a class="radius transition active" href="<?= url("/conta/endereco") ?>" title="Meus Pedidos">Meu
                Endereço</a>
            <a class="radius transition" href="<?= url("/sair") ?>" title="Sair">Sair</a>
        </nav>
        <div class="main_account_content">
            <form class="auth_form" action="<?= url("/conta/endereco") ?>" method="post" enctype="multipart/form-data">
                <div class="ajax_response"><?= flash() ?></div>
                <?= csrf_input(); ?>
                <input type="hidden" name="update" <?= ($address) ? "value='$address->id'" : "" ?>>
                <div class="flex">
                    <label class="label_group flex-2">
                        <div><span class="icon-archive">CEP:</span></div>
                        <input type="text" class="radius mask-code" name="code" placeholder="Informe o CEP:" required
                            <?= ($address) ? "value='$address->code'" : "" ?>/>
                    </label>

                    <label class="label_group flex-2">
                        <div><span></span></div>
                        <button class="label_group_search_code radius transition icon-search">Consultar CEP</button>
                    </label>
                </div>

                <div class="flex">
                    <label class="label_group flex-9">
                        <div><span class="icon-archive">Endereço:</span></div>
                        <input type="text" name="street" placeholder="Informe seu Endereço" class="radius" required
                            <?= ($address) ? "value='{$address->street}'" : "" ?>/>
                    </label>

                    <label class="label_group flex-4">
                        <div><span class="icon-archive">Número:</span></div>
                        <input type="text" name="number" placeholder="Informe seu Número" class="radius" required
                            <?= ($address) ? "value='$address->number'" : "" ?>/>
                    </label>
                </div>

                <div class="flex">
                    <label class="label_group flex-2">
                        <div><span class="icon-archive">Complemento:</span></div>
                        <input type="text" class="radius" name="complement" placeholder="Complemento:"
                            <?= ($address) ? "value='$address->complement'" : "" ?>/>
                    </label>

                    <label class="label_group flex-2">
                        <div class="unlock-alt"><span class="icon-archive">Bairro:</span></div>
                        <input type="text" class="radius" name="neighborhood" placeholder="Informe seu Bairro:"
                               required <?= ($address) ? "value='$address->neighborhood'" : "" ?>/>
                    </label>
                </div>

                <div class="flex">
                    <label class="label_group flex-2">
                        <div><span class="icon-archive">Cidade:</span></div>
                        <input type="text" class="radius" name="city" placeholder="Informe sua cidade:" required
                            <?= ($address) ? "value='$address->city'" : "" ?>/>
                    </label>

                    <label class="label_group flex-2">
                        <div class="unlock-alt"><span class="icon-archive">Estado:</span></div>
                        <input type="text" class="radius" name="uf" placeholder="Informe seu Estado:" required
                            <?= ($address) ? "value='$address->uf'" : "" ?>/>
                    </label>
                </div>

                <div class="flex">
                    <button class="auth_form_btn transition radius flex-1">Cadastrar Endereço</button>
                </div>
            </form>
        </div>
    </div>
</main>
