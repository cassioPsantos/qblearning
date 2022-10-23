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

<div class="header_perfil">
    <img class="imagem_perfil" alt="foto de perfil" src="uploads/<?php 
    echo $dados['foto']
    ?>">
</div>

<div class="capa_perfil">
</div>

<a class="botao btn_editar" href="editar_perfil.php">Editar perfil</a>

<div class="nome_completo">
    <h1><?php echo $dados['nome_completo']?></h1>
</div>

<div class="nome_usuario">
    <p><?php echo "@".$dados['nome_usuario']?></p>
</div>


<div class="descricao">
    <p class="desc_texto"><?php echo $dados['descricao']?></hp>
</div>

</body>
</html>