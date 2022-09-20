<html>
<?php
include('conexao.php');
include('config.php');
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conn, $sql);
?>
<div class='container'>

    <h3 class='p-3'>Usuários cadastrados</h3>

    <a href="cadastrar.php" class="btn btn-success">Cadastrar novo</a>

    <table class='table table-hover'>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>E-mail</td>
            <td>Senha</td>
            <td>Data de Nascimento</td>
            <td>Gênero</td>
            <td class="text-center">Ação</td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $dados['id'] ?></td>
                <td><?php echo $dados['nome'] ?></td>
                <td><?php echo $dados['email'] ?></td>
                <td><?php echo $dados['senha'] ?></td>
                <td><?php echo $dados['nascimento'] ?></td>
                <td><?php echo $dados['genero'] ?></td>
                
                
                <td colspan="2" class="text-center">
                    <a class='btn btn-info btn-sm' href='editaUsuario.php?coduser=<?php echo $dados['coduser'] ?>'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados['coduser'] ?>")'>Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
<script>
    function confirmar(cod) {
        if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluiUsuario.php?coduser=' + cod;
    }
</script>