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
        
        //Executa a montagem no ffmpeg com o devido video e asset
        //Aqui ele combina o vídeo passado com outro
        exec('./ffmpeg -y -i "'.'./temp/'.$id.'_f4.mp4" -i "_assets/p6.mov" -c:v libx264 -crf 5 -framerate 25 -r 25 -shortest -filter_complex "[0][1]overlay[out]" -map "[out]" "'.'./temp/'.$id.'_f5_v.mp4"', $o, $r);
        
        //Checa se o vídeo foi gerado.
        //Caso sim, ele aumenta a barra de progresso na página principal,
        //em caso de falha, ele apaga os assets e gera o erro
        
        if($r == 0 && file_exists('./temp/'.$id.'_f5_v.mp4') == true)
            echo('<script>$("#LOADING_BAR").width("60%");$("#LOADING_BAR")[0].ariaValueNow = 60; $("#LOADING_BAR")[0].innerText = "60%"</script>');
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
            unlink('./temp/'.$id.'_f4_v.mp4');
            unlink('./temp/'.$id.'_f4.mp4');
                        
            //header("Location: error.php");
            
            $str = bin2hex($o);
            echo('<script>$ ("#ERRORPHP").click(function() { window.location = "error.php?e=8.1&r='.$r.'&o='.$str.'"; }); </script>');
            echo('<script>$("#ERRORPHP").trigger("click");</script>'); 
            
            die();
        }
        
        echo('<script>$("#LOADPHP_06").trigger("click");</script>'); //Próxima etapa
        die();
    }
?>
