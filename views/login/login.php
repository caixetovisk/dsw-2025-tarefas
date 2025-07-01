<?php require_once(__DIR__ . '/../components/header.php'); ?>
<div id="tela-login">
    <form>
        <div>
            <label>Login</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div>
            <label>Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <div id="msg-erro">Login ou senha incorreto</div>
        <div>
            <button type="button" id="entrar">Entrar</button>
            <br>
            <a href="/esqueci-minha-senha">Esqueci minha senha</a>
            <br>
            <a href="/cadastrar">Cadastrar</a>
        </div>
    </form>
</div>
<?php require_once( __DIR__ . '/../components/footer.php'); ?>