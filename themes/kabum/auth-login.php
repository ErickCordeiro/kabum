<?php $this->layout('_theme'); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Acessar Conta</h1>
            <p>Ainda não tem cadastro em nossa loja? <a href="<?= url("/cadastrar") ?>">Cadastre-se</a></p>
        </header>
        <form class="auth_form" action="<?= url("/entrar") ?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?= flash() ?></div>
            <br>
            <?= csrf_input(); ?>

            <label class="label_group">
                <div><span class="icon-envelope">Email:</span></div>
                <input type="email" class="radius" name="email" placeholder="Informe seu e-mail:" required/>
            </label>

            <label class="label_group">
                <div class="unlock-alt"><span class="icon-lock">Senha:</span></div>
                <input type="password" class="radius" name="password" placeholder="Informe sua senha:" required/>
            </label>

            <button class="auth_form_btn transition radius">Efetuar Login</button>
        </form>
    </div>
</article>
