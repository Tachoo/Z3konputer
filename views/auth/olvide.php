<?php include_once __DIR__.'/../templates/header.php'; ?>
<main class="main">
    <section class="auth contenedor">
    <h3 class="auth-title">Recuperar password</h3>
        <form class="auth-form" action="/forgot" method="post">
            <div class="auth-form__campo campo-usuario">
                <label for="user">Correo electronico</label>
                <input type="email" name="correo" id="correo" placeholder="Tu Correo Electronico">
            </div>
            <div class="auth-form__campo campo-error">
             <?php include_once __DIR__.'/../templates/alertas.php'; ?>
            </div>
            <div class="auth-form__campo ">
                <button id="auth-form__submit" type="submit">Enviar instruciones</button>
            </div>
            <div class="auth-form__campo auth-help">
                <a href="/help"><span>Ayuda</span></a>
                <a href="/register"><span>Crear Cuenta</span></a>
            </div>
        </form>
    </section>
</main>

<?php $script='<script src="build/js/app.min.js"></script>'?>