<?php

    chdir('..'); //Muda o diretorio
    //Script para subir a imagem
    error_reporting(0);
    ini_set('display_errors', 0);

    //Corrige imagens de mobile (EXIF)
    function CorrectJPEG($filename)
    {
        //Checa se há dados EXIF
        if (function_exists('exif_read_data'))
        {
            $exif = exif_read_data($filename);
            
            //Corrige orientação d a imagem
            if($exif && isset($exif['Orientation']))
            {
                $orientation = $exif['Orientation'];
                if($orientation != 1)
                {
                    $img = imagecreatefromjpeg($filename);
                    $deg = 0;
                    
                    switch ($orientation)
                    {
                        case 3:
                            $deg = 180;
                            break;
                            
                        case 6:
                            $deg = 270;
                            break;
                            
                        case 8:
                            $deg = 90;
                            break;
                    }
                    
                    if ($deg)
                        $img = imagerotate($img, $deg, 0);
                    
                    imagejpeg($img, $filename, 100); //Salve a imagem no servidor
                }
            }
        }   
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['i']) && isset($_GET['n']))
    {
        $id = $_GET['i']; //ID
        $n = $_GET['n']; //número da imagem
        $n1 = intval($_GET['n']) - 1; //número - 1
        
        $str = explode('.', $_FILES['file'.$n]['name']);
        $ext = end($str);
        
        $up = move_uploaded_file($_FILES['file'.$n]['tmp_name'], 'temp/'.$id.'_foto_0'.$n1.'.'.$ext); //Move para a pasta temp
                
        if($up == true)
        {
            $lower = strtolower($ext);
            
            //Se for JPG ou JPEG, checa se tem dados EXIF
            if($lower == 'jpg' || $lower == 'jpeg')
                CorrectJPEG('temp/'.$id.'_foto_0'.$n1.'.'.$ext);
            
            echo('temp/'.$id.'_foto_0'.$n1.'.'.$ext);
        }
        else
            echo('false');
    }
?>
