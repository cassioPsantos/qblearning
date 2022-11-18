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
    $tipo_cubo = $_POST['tipo_cubo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $manutencao = $_POST['manutencao'];
    $aquisicao = $_POST['aquisicao'];
    
    $sql = "UPDATE cubos
            SET tipo_cubo='$tipo_cubo', marca='$marca', modelo='$modelo', manutencao='$manutencao', aquisicao='$aquisicao'
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
?>
<div class="row">
<div class="container col-10">
    <form method="post">

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                Tipo de cubo: <select class='form-control' name="tipo_cubo" required>
                <option value="2x2">2x2</option>
                <option value="3x3">3x3</option>
                <option value="4x4">4x4</option>
                <option value="5x5">5x5</option>
                <option value="6x6">6x6</option>
                <option value="7x7">7x7</option>
                <option value="Piramynx">Piramynx</option>
                <option value="Megaminx">Megaminx</option>
                <option value="Skewb">Skewb</option>
                <option value="Square-1">Square-1</option>
                <option value="Clock">Clock</option>
                </select>
            </div>
        </div>
    </div>

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

<div class="container fundo_cadastro col-6">
    <div>
        <img src="imagens/logobranco.png" alt="Logo QBLearning" class="logocad">
    </div>
</div>
</div>
</body>
</html>