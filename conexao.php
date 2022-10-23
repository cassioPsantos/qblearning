<?php
$conn = mysqli_connect('localhost', 'root', '') or die ("Não possível conectar ao banco de dados");
$banco = mysqli_select_db($conn, 'qblearning');

function tempoFinal($init) {
    if ($init > 59) {
    $secs = floor($init);
    $milli = (int) (($init - $secs) * 101);

    $hours = ($secs / 3600);
    $minutes = (($secs / 60) % 60);
    $seconds = $secs % 60;

    if($minutes < 10) {
        $minutes = "0".$minutes;
    }

    if($seconds < 10) {
        $seconds = "0".$seconds;
    }

    $tempo_final = "$minutes:$seconds.$milli";
    return $tempo_final;
    } else {
    $tempo_final = $init;
    return $tempo_final; 
    }
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>