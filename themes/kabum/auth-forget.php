<?php $this->layout("_theme"); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Recuperar senha</h1>
            <p>Informe seu e-mail para receber um link de recuperação.</p>
        </header>

        <form class="auth_form" data-reset="true" action="<?= url("/recuperar")?>" method="post" enctype="multipart/form-data">
            <div class="ajax_reponse"><?= flash(); ?></div>
            <?= csrf_input(); ?>
            <br>
            <label class="label_group">
                <div class="unlock-alt flex" style="justify-content: space-between">
                    <span class="icon-envelope">Email:</span>
                    <span><a style="color: var(--themeColorA); font-weight: bold" title="Recuperar senha" href="<?= url("/entrar"); ?>">Voltar e entrar!</a></span>
                </div>
                <input type="email" name="email" placeholder="Informe seu e-mail:" required class="radius"/>
            </label>

            <button class="auth_form_btn transition radius">Recuperar</button>
        </form>
    </div>
</article>