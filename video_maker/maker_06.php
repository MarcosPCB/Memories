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
        //Aqui ele insere a terceira 
        
        //FFmpeg config: reescala a imagem MANTENDO o proporção original adicionado padding lateral ou vertical - como ele converte a imagem em vídeo, é preciso especificar para cortar (TRIM) no tempo corretoimagem
        exec('./ffmpeg -y -i "_assets/BG_PNG_01.mp4" -i "'.$_GET['i2'].'" -i "'.'./temp/'.$id.'_f5_v.mp4" -c:v libx264 -crf 5 -framerate 25 -r 25 -shortest -filter_complex "[1]scale=650:650:force_original_aspect_ratio=decrease,pad=650:650:(ow-iw)/2:(oh-ih)/2,setsar=1[im1];[0][im1]overlay=x=365:y=170,rotate=-2*PI/180,trim=duration=3[ovl];[2]chromakey=0x00FF00:0.2:0.1:0[ckout];[ovl][ckout]overlay[out]" -map "[out]" "'.'./temp/'.$id.'_f5.mp4" 2>&1', $o, $r);
        
        //Checa se o vídeo foi gerado.
        //Caso sim, ele aumenta a barra de progresso na página principal,
        //em caso de falha, ele apaga os assets e gera o erro

        if($r == 0 && file_exists('./temp/'.$id.'_f5.mp4') == true)
            echo('<script>$("#LOADING_BAR").width("71%");$("#LOADING_BAR")[0].ariaValueNow = 71; $("#LOADING_BAR")[0].innerText = "71%"</script>');
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
            unlink('./temp/'.$id.'_f5_v.mp4');
                        
            //header("Location: error.php");
            
            $str = bin2hex($o);
            echo('<script>$ ("#ERRORPHP").click(function() { window.location = "error.php?e=8&r='.$r.'&o='.$str.'"; }); </script>');
            echo('<script>$("#ERRORPHP").trigger("click");</script>'); 
        }
        
        echo('<script>$("#LOADPHP_07").trigger("click");</script>'); //Próxima etapa
        die();
    }
?>
