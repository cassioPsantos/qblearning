<?php session_start() ?>
<html>
<?php 
include('conexao.php');
include('navbar.php');
?>

<head>
<title>Perfil - QBLearning</title>
</head>

<body>
<h1 class="titulo"><?php echo $_SESSION['nome_usuario']?></h1>
<br>

<h2 class="subtitulo">Informações pessoais</h2>
<br>
<h6 class="dadosperfil">&#9658; Nome completo: <?php echo $_SESSION['nome_completo']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Endereço de email: <?php echo $_SESSION['email_usuario']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Senha: <?php echo $_SESSION['senha_usuario']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Gênero: <?php echo $_SESSION['genero_usuario']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Data de nascimento: <?php echo $_SESSION['nascimento_usuario']?></h6>
<br>

<!-- <script> function mostrar_senha() {
  var x = document.getElementById("mostrarsenha");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<label for="mostrarsenha" class="mostrarsenha1">Exibir senha</label>
<input class="mostrarsenha" type="checkbox" name="mostrarsenha" onclick="mostrar_senha()">
-->

</h6>
</body>
</html>