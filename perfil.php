<?php session_start() ?>
<html>
<?php 
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id='$id_usuario'";
$query = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($query);
?>

<head>
<title>Perfil - QBLearning</title>
</head>

<body>
<h1 class="titulo"><?php echo $_SESSION['nome_usuario']?></h1>
<br>
<h2 class="subtitulo">Informações pessoais</h2>
<br>
<h6 class="dadosperfil">&#9658; Nome completo: <?php echo $dados['nome_completo']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Endereço de email: <?php echo $dados['email']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Senha: <?php echo $dados['senha']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Gênero: <?php echo $dados['genero']?></h6>
<br>
<h6 class="dadosperfil">&#9658; Data de nascimento: <?php echo $dados['nascimento']?></h6>
<br>
<a class="btn btn-primary perfilbtn" href="editar_perfil.php">Editar perfil</a>
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
</body>
</html>