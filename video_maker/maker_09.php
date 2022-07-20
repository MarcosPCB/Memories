<?php
    chdir('..'); //Muda o diretorio
    //Valida as variaveis GET
    if(isset($_GET['i']) && isset($_GET['a']) && isset($_GET['d']) && isset($_GET['i0']) && isset($_GET['i1']) && isset($_GET['i2']) && isset($_GET['i3']))
    {
        $r = 0;
        $id = $_GET['i'];
        $o = '';
        $decade = '';
        $area = '';
        
        //Executa a montagem FINAL no ffmpeg
        //Insere a trilha de audio no vídeo
        exec('./ffmpeg -y -i "'.'./temp/'.$id.'_fvideo.mp4" -i "_assets/SFX.wav" -shortest -c:v copy -c:a aac "'.'./temp/'.$id.'_final.mp4" 2>&1', $o, $r);
        
        //Checa se o vídeo foi gerado.
        //Caso sim, ele aumenta a barra de progresso na página principal,
        //em caso de falha, ele apaga os assets e gera o erro

        if($r == 0 && file_exists('./temp/'.$id.'_final.mp4') == true)
            echo('<script>$("#LOADING_BAR").width("100%");$("#LOADING_BAR")[0].ariaValueNow = 100; $("#LOADING_BAR")[0].innerText = "100%"; $("LOADING_BAR").toggleClass("bg-success");</script>');
        else
        {
            unlink('./temp/'.$id.'_nome.png');
            unlink('./temp/'.$id.'_tempo.png');

            unlink($_GET['i0']);
            unlink($_GET['i1']);
            unlink($_GET['i2']);
            unlink($_GET['i3']);
            
            unlink('./temp/'.$id.'_f1.mp4');
            unlink('./temp/'.$id.'_f2.mp4');
            unlink('./temp/'.$id.'_f3.mp4');
            unlink('./temp/'.$id.'_f4.mp4');
            unlink('./temp/'.$id.'_f4_v.mp4');
            unlink('./temp/'.$id.'_f5.mp4');
            unlink('./temp/'.$id.'_f5_v.mp4');
            unlink('./temp/'.$id.'_f6.mp4');
            unlink('./temp/'.$id.'_fvideo.mp4');
                        
            //header("Location: error.php");
            
            $str = bin2hex($o);
            echo('<script>$ ("#ERRORPHP").click(function() { window.location = "error.php?e=11&r='.$r.'&o='.$str.'"; }); </script>');
            echo('<script>$("#ERRORPHP").trigger("click");</script>'); 
            
            die();
        }
        
        //Vídeo okay... apaga os arquivos
        //Fotos, PNGs gerados e os vídeos gerados
        unlink('./temp/'.$id.'_nome.png');
        unlink('./temp/'.$id.'_tempo.png');

        unlink($_GET['i0']);
        unlink($_GET['i1']);
        unlink($_GET['i2']);
        unlink($_GET['i3']);
            
        unlink('./temp/'.$id.'_f1.mp4');
        unlink('./temp/'.$id.'_f2.mp4');
        unlink('./temp/'.$id.'_f3.mp4');
        unlink('./temp/'.$id.'_f4.mp4');
        unlink('./temp/'.$id.'_f4_v.mp4');
        unlink('./temp/'.$id.'_f5.mp4');
        unlink('./temp/'.$id.'_f5_v.mp4');
        unlink('./temp/'.$id.'_f6.mp4');
        unlink('./temp/'.$id.'_fvideo.mp4');
        
        echo('<script>$("#LOADPHP_01").trigger("click");</script>'); //Etapa de entrega do vídeo
        die();
    }
?>
