<?php include_once(__DIR__ . "/../components/header.php"); ?>
<h1>Cadastrar Usuário</h1>

<form id="cadastrar_usuario">
   <div id="msg-erro"></div>
   <div>
      <label>Nome</label>
      <input type="text" id="nome" name="nome" maxlength="100" required>
   </div>
   <div>
      <label>E-mail</label>
      <input type="email" id="email" name="email" maxlength="255" required>
   </div>
   <div>
      <label>Login</label>
      <input type="text" id="login" name="login" maxlength="50" required>
   </div>
   <div>
      <label>Senha</label>
      <input type="password" id="senha" name="senha" maxlength="50" required>
   </div>
   <div> <button type="button" id="btn_cadastrar_usuario">Cadastrar</button> </div>

</form>

<?php include_once(__DIR__ . "/../components/footer.php"); ?>