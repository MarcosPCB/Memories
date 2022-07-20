<?php
    chdir('..'); //Muda o diretorio
    //Aqui não é executada a conversão da imagem
    //ele somente salva o que tá no blob em JPG
    //e apaga o HEIC/HEIF original!

    error_reporting(0);
    ini_set('display_errors', 0);
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['i']) && isset($_GET['n']))
    {
        $id = $_GET['i'];
        $n = intval($_GET['n']) - 1;
        
        //Apaga o arquivo original
        if(file_exists('temp/'.$id.'_foto_0'.$n.'.heic') == true)
            unlink('temp/'.$id.'_foto_0'.$n.'.heic');
        else if(file_exists('temp/'.$id.'_foto_0'.$n.'.heif') == true)
            unlink('temp/'.$id.'_foto_0'.$n.'.heif'); 
        
        //Pega o que ta no blob
        $img = file_get_contents("php://input");
        
        if($img == false)
            echo('h_error');
        else
        {
            //Salva em JPG
            $up = file_put_contents('temp/'.$id.'_foto_0'.$n.'.jpg', $img);

            if($up == true)
                echo('temp/'.$id.'_foto_0'.$n.'.jpg');
            else
                echo('false');
        }
        
    }
?>
