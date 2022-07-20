<?php
    chdir('..'); //Muda o diretorio
    //Script para remover imagem do servidor
    error_reporting(0);
    ini_set('display_errors', 0);

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['f']))
        unlink($_GET['f']);
?>
