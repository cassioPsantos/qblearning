<html>
<?php include('config.php');
include('conexao.php');
include('navbar.php');
$sql = "SELECT * FROM cubos";
$query = mysqli_query($conn, $sql);
?>
<head>
<link rel="stylesheet" href="css.css">
</head>

<body>
    <h1 class="titulo">Coleção</h1>
    <a class="btn btn-primary colbtn" href="cadastrar_cubo.php">Cadastrar novo cubo</a>

    <table class='table table-hover'>
        <tr>
            <td>Tipo de Cubo</td>
            <td>Modelo</td>
            <td>Data de manutenção</td>
            <td>Data de aquisição</td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $dados['tipo_cubo'] ?></td>
                <td><?php echo $dados['modelo'] ?></td>
                <td><?php echo $dados['manutencao'] ?></td>
                <td><?php echo $dados['aquisicao'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>