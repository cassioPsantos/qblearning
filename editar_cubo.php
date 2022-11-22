<?php session_start(); ?>
<html>
<?php 
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
$codigo_cubo = $_GET['codigo_cubo'];
?>

<head>
<link rel="stylesheet" href="css.css">
<title>Editar - QBLearning</title>
</head>

<body id="cadastrobarra">
<h1 class="titulo1">Editar cubo</h1>

<?php
if (isset($_POST['btnEnviar'])) {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $manutencao = $_POST['manutencao'];
    $aquisicao = $_POST['aquisicao'];
    
    $sql = "UPDATE cubos
            SET marca='$marca', modelo='$modelo', manutencao='$manutencao', aquisicao='$aquisicao'
            WHERE id_usuario='$id_usuario' AND cod='$codigo_cubo'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Cubo atualizado com sucesso.') </script>";
        header("Location: http://localhost/qblearning/colecao.php");
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
} else {
    $sql = "SELECT * FROM cubos WHERE id_usuario='$id_usuario' AND cod='$codigo_cubo'";
    $query = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($query);
    $tipo_cubo = $dados['tipo_cubo'];
    $marca = $dados['marca'];
    $modelo = $dados['modelo'];
    $manutencao = $dados['manutencao'];
    $aquisicao = $dados['aquisicao'];
}

switch ($tipo_cubo) {
    case '2x2':
        $img_detalhes = "2x2.png";
        $nome_cubo = "Cubo 2x2";
        break;
    case '3x3':
        $img_detalhes = "3x3.png";
        $nome_cubo = "Cubo 3x3";
        break;
    case '4x4':
        $img_detalhes = "4x4.png";
        $nome_cubo = "Cubo 4x4";
        break;
    case '5x5':
        $img_detalhes = "5x5.png";
        $nome_cubo = "Cubo 5x5";
        break;
    case '6x6':
        $img_detalhes = "6x6.png";
        $nome_cubo = "Cubo 6x6";
        break;
    case '7x7':
        $img_detalhes = "7x7.png";
        $nome_cubo = "Cubo 7x7";
        break;
    case 'Piramynx':
        $img_detalhes = "piramynx.png";
        $nome_cubo = "Piramynx";
        break;
    case 'Megaminx':
        $img_detalhes = "megaminx.png";
        $nome_cubo = "Megaminx";
        break;
    case 'Skewb':
        $img_detalhes = "skewb.png";
        $nome_cubo = "Skewb";
        break;
    case 'Square-1':
        $img_detalhes = "square1.png";
        $nome_cubo = "Square-1";
        break;
    case 'Clock':
        $img_detalhes = "clock.png";
        $nome_cubo = "Clock";
        break;
}
?>

<div class="titulo_editar_cubo">
    <img class="img_editar_cubo" src="imagens/<?php echo $img_detalhes ?>" alt="cube_image" class="img_cubo">
    <h1 class="titulo_editar"><?php echo $nome_cubo ?></h1>
</div>

<div class="row">
<div class="container col-10">
    <form method="post">

    <div class="row">
        <div class="col-6">
            <div class="form-group">
            Marca do cubo: <input class="form-control" type="text" name="marca" value="<?php echo $marca ?>"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
            Modelo do cubo: <input class="form-control" type="text" name="modelo" value="<?php echo $modelo ?>"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
            Data de aquisição: <input class='form-control' type="date" name="aquisicao" value="<?php echo $aquisicao ?>"/>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-6">
            <div class="form-group">
            Última manutenção: <input class='form-control' type="date" name="manutencao" value="<?php echo $manutencao ?>"/>
            </div>
        </div>
    </div>


    <div class="form-group">
        <input class='botao_azul' type="submit" value="Editar cubo" name="btnEnviar" />
        <a class="botao_vermelho" href="colecao.php">Cancelar</a>
    </div>

    </form>
</div>

<div class="container edit_fundo fundo_cadastro col-6">
    <div>
        <img src="imagens/logobranco.png" alt="Logo QBLearning" class="logocad">
    </div>
</div>

</div>

</body>
</html>