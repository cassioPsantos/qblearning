<?php session_start(); ?>
<html>
<?php 
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];
?>

<head>
<link rel="stylesheet" href="css.css">
<title>Cadastrar cubo - QBLearning</title>
</head>

<body id="cadastrobarra">
<h1 class="titulo1">Cadastrar novo cubo</h1>

<?php
if (isset($_POST['btnEnviar'])) {
    $tipo_cubo = $_POST['tipo_cubo'];
    $modelo = $_POST['modelo'];
    $manutencao = $_POST['manutencao'];
    $aquisicao = $_POST['aquisicao'];
    
    $sql = "INSERT INTO cubos (id_usuario, tipo_cubo, modelo, manutencao, aquisicao) 
            VALUES ('$id_usuario', '$tipo_cubo', '$modelo', '$manutencao', '$aquisicao')";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Cubo cadastrado com sucesso.') </script>";
        header("Location: http://localhost/qblearning/colecao.php");
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
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
            Modelo do cubo: <input class="form-control" type="text" name="modelo"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
            Data de aquisição: <input class='form-control' type="date" name="aquisicao" />
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-6">
            <div class="form-group">
            Última manutenção: <input class='form-control' type="date" name="manutencao" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            <div class="form-group">
                    <input class='btn btn-primary' type="submit" value="Cadastrar cubo" name="btnEnviar" />
            </div>
        </div>
        <div class="col-1">
            <div class="form-group cancelarbtn">
            <a class="btn btn-danger" href="colecao.php">Cancelar</a>
            </div>
        </div>
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