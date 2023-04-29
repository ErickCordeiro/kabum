<?php $this->layout('_theme-auth'); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Criar nova senha</h1>
            <p>Informe e repita uma nova senha para recuperar o acesso.</p>
        </header>

        <form class="auth_form" action="<?= url("/recuperar/resetar")?>" method="post" enctype="multipart/form-data">
            <div class="ajax_reponse"><?= flash(); ?></div>
            <input type="hidden" name="code" value="<?= $code ?>">
            <?= csrf_input(); ?>
            <br>
            <label class="label_group">
                <div class="unlock-alt flex" style="justify-content: space-between">
                    <span class="icon-lock">Nova Senha:</span>
                    <span><a style="color: var(--themeColorA); font-weight: bold" title="Voltar e entrar" href="<?= url("/entrar"); ?>">Voltar e entrar</a></span>
                </div>
                <input type="password" name="password" placeholder="Informe a nova senha:" required/>
            </label>

            <label class="label_group">
                <div class="unlock-alt"><span class="icon-lock">Repita a Nova Senha:</span></div>
                <input type="password" name="password_re" placeholder="Repita a nova senha:" required/>
            </label>

            <button class="auth_form_btn transition gradient gradient-green gradient-hover">Alterar Senha</button>
        </form>
    </div>
</article>