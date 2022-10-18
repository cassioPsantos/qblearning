<?php session_start() ?>
<div id="tempo_comeca1">
<link rel="stylesheet" href="css.css">
<div class="topnav">
  <img src="imagens/logo.png" alt="Logo QBLearning" class="navlogo">
  <a class="navbtn" href="tutorial.php">Tutoriais</a>
  <a class="navbtn" href="cronometro.php">Cronômetro</a>
  <a class="navbtn" href="tempos.php">Tempos</a>
  <a class="navbtn" href="algoritmos.php">Algoritmos</a>
  <a class="navbtn" href="colecao.php">Coleção</a>
  <a class="navbtn logoff" href="entrar.php">Log off</a>
  <a class="navbtn perfil" href="perfil.php">Perfil: <?php echo $_SESSION['nome_usuario']?></a>
</div>
</div>