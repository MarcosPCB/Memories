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
        //Aqui combina a introdução do vído com a parte especifica ao ano que a pessoa começou a trabalhar lá e o restante que foi gerado

        switch($_GET['d'])
        {
            case 0:
                $decade = '_assets/p3_607090.mp4';
                break;
                
            case 1:
                $decade = '_assets/p3_2000.mp4';
                break;
                
            case 2:
                $decade = '_assets/p3_2010.mp4';
                break;
                
            case 3:
                $decade = '_assets/p3_2020.mp4';
                break;
        }

        exec('./ffmpeg -y -i "_assets/intro.mp4" -i "'.'./temp/'.$id.'_f1.mp4" -i "'.$decade.'" -i '.'./temp/'.$id.'_f5.mp4 -i '.'./temp/'.$id.'_f6.mp4 -i "_assets/p8.mp4" -r 25 -filter_complex "[0][1][2][3][4][5]concat=n=6:v=1[out]" -map "[out]" "'.'./temp/'.$id.'_fvideo.mp4" 2>&1', $o, $r);
        
        //Checa se o vídeo foi gerado.
        //Caso sim, ele aumenta a barra de progresso na página principal,
        //em caso de falha, ele apaga os assets e gera o erro

        if($r == 0 && file_exists('./temp/'.$id.'_fvideo.mp4') == true)
            echo('<script>$("#LOADING_BAR").width("95%");$("#LOADING_BAR")[0].ariaValueNow = 95; $("#LOADING_BAR")[0].innerText = "95%"</script>');
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
                        
            //header("Location: error.php");
            
            $str = bin2hex($o);
            echo('<script>$ ("#ERRORPHP").click(function() { window.location = "error.php?e=10&r='.$r.'&o='.$str.'"; }); </script>');
            echo('<script>$("#ERRORPHP").trigger("click");</script>'); 
            
            die();
        }
        
        echo('<script>$("#LOADPHP_09").trigger("click");</script>'); //Próxima etapa
        die();
    }
?>
