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

$sql_2x2 = "SELECT * FROM cubos WHERE tipo_cubo = '2x2' AND id_usuario='$id_usuario'";
$query_2x2 = mysqli_query($conn, $sql_2x2);

$sql_3x3 = "SELECT * FROM cubos WHERE tipo_cubo = '3x3' AND id_usuario='$id_usuario'";
$query_3x3 = mysqli_query($conn, $sql_3x3);

$sql_4x4 = "SELECT * FROM cubos WHERE tipo_cubo = '4x4' AND id_usuario='$id_usuario'";
$query_4x4 = mysqli_query($conn, $sql_4x4);

$sql_5x5 = "SELECT * FROM cubos WHERE tipo_cubo = '5x5' AND id_usuario='$id_usuario'";
$query_5x5 = mysqli_query($conn, $sql_5x5);

$sql_6x6 = "SELECT * FROM cubos WHERE tipo_cubo = '6x6' AND id_usuario='$id_usuario'";
$query_6x6 = mysqli_query($conn, $sql_6x6);

$sql_7x7 = "SELECT * FROM cubos WHERE tipo_cubo = '7x7' AND id_usuario='$id_usuario'";
$query_7x7 = mysqli_query($conn, $sql_7x7);

$sql_piramynx = "SELECT * FROM cubos WHERE tipo_cubo = 'Piramynx' AND id_usuario='$id_usuario'";
$query_piramynx = mysqli_query($conn, $sql_piramynx);

$sql_megaminx = "SELECT * FROM cubos WHERE tipo_cubo = 'Megaminx' AND id_usuario='$id_usuario'";
$query_megaminx = mysqli_query($conn, $sql_megaminx);

$sql_skewb = "SELECT * FROM cubos WHERE tipo_cubo = 'Skewb' AND id_usuario='$id_usuario'";
$query_skewb = mysqli_query($conn, $sql_skewb);

$sql_square1 = "SELECT * FROM cubos WHERE tipo_cubo = 'Square-1' AND id_usuario='$id_usuario'";
$query_square1 = mysqli_query($conn, $sql_square1);

$sql_clock = "SELECT * FROM cubos WHERE tipo_cubo = 'Clock' AND id_usuario='$id_usuario'";
$query_clock = mysqli_query($conn, $sql_clock);

?>
<head>
<link rel="stylesheet" href="css.css">
<title>Coleção - QBLearning</title>
</head>

<body>
    <h1 class="titulo">Coleção</h1>
    <a class="botao_azul colbtn" href="cadastrar_cubo.php">Cadastrar novo cubo</a>

    <table class="tabela_cubos">
        <tr>
            <td class="titulo_tabela_cubos_tipo">Tipo de Cubo</td>
            <td class="titulo_tabela_cubos_modelo">Modelo</td>
            <td class="titulo_tabela_cubos_data">Última manutenção</td>
            <td class="titulo_tabela_cubos_data">Data de aquisição</td>
            <td class="titulo_tabela_cubos_botoes"></td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query_2x2)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
                <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/2x2.png" alt="2x2">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_3x3)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/3x3.png" alt="3x3">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_4x4)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/4x4.png" alt="4x4">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_5x5)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/5x5.png" alt="5x5">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_6x6)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/6x6.png" alt="6x6">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_7x7)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/7x7.png" alt="7x7">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_piramynx)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/piramynx.png" alt="piramynx">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_megaminx)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/megaminx.png" alt="megaminx">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_skewb)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/skewb.png" alt="skewb">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_square1)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/square1.png" alt="square1">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
                    <form method="GET">
                    <input type="submit" name="deletar_btn" onclick="return confirm('Tem certeza que deseja excluir esse cubo da sua coleção? Essa ação não pode ser desfeita.')" class='botao_vermelho esp' value="Excluir"></input>
                    <input type="hidden" name="codigo_cubo" value="<?php echo $codigo_cubo ?>"></input>
                    </form>
                    </div>
                </td>
            </tr>
        <?php } ?>

        <?php while ($dados = mysqli_fetch_array($query_clock)) { $codigo_cubo = $dados['cod']; ?>
            <tr>
            <td class="linha_tabela_cubos">
                    <img class="img_linha_cubo" src="imagens/clock.png" alt="clock">
                    <?php echo $dados['tipo_cubo'] ?>
                </td>
                <td class="linha_tabela_cubos"><?php echo $dados['modelo'] ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['aquisicao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos"><?php echo date_format(date_create($dados['manutencao']), "d/m/Y") ?></td>
                <td class="linha_tabela_cubos">
                    <div class="esp2">
                    <a class='botao_azul esp esp3' href='editar_cubo.php?codigo_cubo=<?php echo $codigo_cubo ?>'>Editar</a>
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