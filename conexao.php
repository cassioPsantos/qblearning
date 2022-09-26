<?php
$conn = mysqli_connect('localhost', 'root', 'aluno01') or die ("Não possível conectar ao banco de dados");
$banco = mysqli_select_db($conn, 'qblearning');