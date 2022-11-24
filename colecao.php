<?php session_start(); ?>
<html>
<?php
include('conexao.php');
include('navbar.php');
$id_usuario = $_SESSION['id_usuario'];

if (isset($_GET['deletar_btn'])) {
    $i = $_GET['codigo_cubo'];
    $sql_deletar = "DELETE FROM cubos WHERE cod='$i' AND id_usuario='$id_usuario'";
    mysqli_query($conn, $sql_deletar);
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: colecao.php");
    } else {
        echo "<script>alert('Houve algum erro.');</script>";
        mysqli_error($conn);
        echo $conn->error;
        header("Location: colecao.php");
    }
}

if (isset($_POST['btnEnviar'])) {
    $pesquisa = $_POST['pesquisa'];
    if ($pesquisa != null) {
        $sql = "SELECT * FROM cubos WHERE id_usuario='$id_usuario' AND (tipo_cubo LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%') ORDER BY tipo_cubo";
        $query = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM cubos WHERE id_usuario='$id_usuario'";
        $query = mysqli_query($conn, $sql);
    }
} else {
    $sql = "SELECT * FROM cubos WHERE id_usuario='$id_usuario'";
    $query = mysqli_query($conn, $sql);
}

?>

<head>
<link rel="stylesheet" href="css.css">
<title>Coleção - QBLearning</title>
</head>

<body>
    <h1 class="titulo">Coleção</h1>
    <a class="botao_azul colbtn" href="cadastrar_cubo.php">Cadastrar novo cubo</a>

    <form method="POST">
        <div class="pesquisar form-group">
            <p class="pesq_titulo">Pesquisar:</p> 
            <input class="pesq_campo form-control" type="text" name="pesquisa" value="<?=$pesquisa?>">
            <input class="pesq_btn botao_azul" type="submit" value="Pesquisar" name="btnEnviar"/>
        </div>  
    </form>

    <table class="tabela_cubos">
        <tr>
            <td class="titulo_tabela_cubos_tipo">Tipo de Cubo</td>
            <td class="titulo_tabela_cubos_marca">Marca</td>
            <td class="titulo_tabela_cubos_modelo">Modelo</td>
            <td class="titulo_tabela_cubos_data">Última manutenção</td>
            <td class="titulo_tabela_cubos_data">Data de aquisição</td>
            <td class="titulo_tabela_cubos_botoes"></td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
                <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/<?php 
                    switch ($dados['tipo_cubo']) {
                        case '2x2':
                            echo '2x2';
                            break;
                        case '3x3':
                            echo '3x3';
                            break;
                        case '4x4':
                            echo '4x4';
                            break;
                        case '5x5':
                            echo '5x5';
                            break;
                        case '6x6':
                            echo '6x6';
                            break;
                        case '7x7':
                            echo '7x7';
                            break;
                        case 'Piramynx':
                            echo 'piramynx';
                            break;
                        case 'Megaminx':
                            echo 'megaminx';
                            break;
                        case 'Skewb':
                            echo 'skewb';
                            break;
                        case 'Square-1':
                            echo 'square1';
                            break;
                        case 'Clock':
                            echo 'clock';
                            break;
                    };
                    ?>.png" alt="<?php 
                    echo $dados['tipo_cubo'];
                    ?>">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['marca'] ?></td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php
                                                if ($dados['aquisicao'] != '0000-00-00') {
                                                    echo date_format(date_create($dados['aquisicao']), "d/m/Y");
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?></td>
                <td class="linha_tabela_cubos"><?php    
                                                if ($dados['manutencao'] != '0000-00-00') {
                                                    echo date_format(date_create($dados['manutencao']), "d/m/Y");
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp5 esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<br>
<br>
<br>
<br>
</body>
</html>