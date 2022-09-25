<html>
<?php include('config.php');
include('conexao.php');
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
    
    $sql = "INSERT INTO cubos (tipo_cubo, modelo, manutencao, aquisicao) 
            VALUES ('$tipo_cubo', '$modelo', '$manutencao', '$aquisicao')";

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
                <option value="1">2x2</option>
                <option value="2">3x3</option>
                <option value="3">4x4</option>
                <option value="4">5x5</option>
                <option value="5">6x6</option>
                <option value="6">7x7</option>
                <option value="7">Piramynx</option>
                <option value="8">Megamynx</option>
                <option value="9">Skewb</option>
                <option value="10">Square-1</option>
                <option value="11">Clock</option>
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
            Última manutenção: <input class='form-control' type="date" name="manutencao" />
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
        <div class="col-2">
            <div class="form-group">
                    <input class='btn btn-primary' type="submit" value="Cadastrar cubo" name="btnEnviar" />
            </div>
        </div>
        <div class="col">
            <div class="form-group">
            <a class="btn btn-danger" href="colecao.php">Cancelar</a>
            </div>
        </div>
    </div>

    </form>
</div>

<div class="container fundo_cadastro col-6">
    <div>
        <img src="logobranco.png" alt="Logo QBLearning" class="logocad">
    </div>
</div>
</div>
</body>
</html>