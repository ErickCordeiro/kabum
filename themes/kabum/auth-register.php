<?php $this->layout('_theme-auth'); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Cadastre-se</h1>
            
            <p>Já tem cadastro em nossa loja? <a href="<?= url("/entrar")?>">Efetuar o login</a></p>
        </header>

        <form class="auth_form" action="<?= url("/cadastrar") ?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?= flash() ?></div>
            <br>
            <?= csrf_input(); ?>
            <label class="label_group">
                <div><span class="icon-user">Nome:</span></div>
                <input type="text" class="radius" name="first_name" placeholder="Primeiro nome:" required/>
            </label>

            <label class="label_group">
                <div><span class="icon-user-plus">Sobrenome:</span></div>
                <input type="text" class="radius" name="last_name" placeholder="Último nome:" required/>
            </label>

            <label class="label_group">
                <div><span class="icon-envelope">Email:</span></div>
                <input type="email" class="radius" name="email" placeholder="Informe seu e-mail:" required/>
            </label>

            <label class="label_group">
                <div class="unlock-alt"><span class="icon-lock">Senha:</span></div>
                <input type="password" class="radius" name="password" placeholder="Informe sua senha:" required/>
            </label>

            <button class="auth_form_btn transition radius">Criar conta</button>
        </form>
    </div>
</article>
