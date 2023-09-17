<?php include_once __DIR__.'/../templates/header.php'; ?>
<main class="main">
    <section class="auth contenedor">
    <h3 class="auth-title">Recuperar password</h3>
        <form class="auth-form" method="post">
        <div class="auth-form__campo campo-password">
                <label for="password">contraseña</label>
                <input type="password" name="password" id="password" placeholder="Tu Contraseña">
            </div>
            <div class="auth-form__campo campo-confirm_password">
                <label for="confirm_password">confirma contraseña</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="confirma contraseña">
            </div>
            <div class="auth-form__campo campo-error">
             <?php include_once __DIR__.'/../templates/alertas.php'; ?>
            </div>
            <div class="auth-form__campo ">
                <button id="auth-form__submit" type="submit">Enviar instruciones</button>
            </div>
            <div class="auth-form__campo auth-help">
                <a href="/help"><span>Ayuda</span></a>
                <a href="/register"><span>Guardar nueva contraseña</span></a>
            </div>
        </form>
    </section>
</main>

<?php $script='<script src="build/js/app.min.js"></script>'?>