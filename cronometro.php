<html>
<?php include('config.php');
include('navbar.php');
?>

<head>
</head>

<body>
    <span id="tempo">20</span><br>
    <button onclick="para()" >PARA</button>
    <button onclick="inicia()" >INICIA</button>
    <button onclick="salva()" >SALVA</button>

    ESSA PAGINA É UM CRONOMETRO
    <script>
        let tempo = 0;
        let timer;

        function inicia(){
            tempo=0
            timer = setInterval(() => {
                tempo += 0.01;
                document.getElementById('tempo').innerHTML = tempo.toFixed(2);
            }, 10);
        }
        function para(){
            clearInterval(timer);
        }
        function salva(){
            window.location.href = '/qblearning/salvacronometro.php?tempo='+tempo.toFixed(2)
        }
    </script>
</body>
</html>