<?php require_once(__DIR__ . '/../components/header.php'); ?>
<div id="login">
    <form>
        <div>
            <label>Login</label>
            <input type="text" name="login">
        </div>
        <div>
            <label>Senha</label>
            <input type="password" name="senha">
        </div>
        <div>
            <button type="button">Entrar</button>
            <br>
            <a href="/esqueci-minha-senha">Esqueci minha senha</a>
            <br>
            <a href="/cadastrar">Cadastrar</a>
        </div>
    </form>
</div>
<?php require_once( __DIR__ . '/../components/footer.php'); ?>