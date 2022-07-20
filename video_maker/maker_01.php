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
        //Aqui é a parte referente ao ano com o nome

        //FFmpeg config: utiliza o chromakey na cor especifica e posiciona o nome e o ano de acordo com as coordenadas
        switch($_GET['a'])
        {
            case 0:
                exec('./ffmpeg -y -i "_assets/white_BG.png" -i "'.'./temp/'.$id.'_nome.png" -i "'.'./temp/'.$id.'_tempo.png" -i "_assets/p1_01.mp4" -c:v libx264 -crf 5 -r 25 -shortest -pix_fmt yuv444p -filter_complex "[3]chromakey=0x00FF00:0.27:0.1[ckout];[0][1]overlay=x=464:y=351,trim=start=0:end=4,setpts=PTS-STARTPTS[nscr];[nscr][2]overlay=x=823:y=544[ntscr];[ntscr][ckout]overlay[out]" -map "[out]" "'.'./temp/'.$id.'_f1.mp4" 2>&1', $o, $r);
                break;
                
            case 1:
                exec('./ffmpeg -y -i "_assets/white_BG.png" -i "'.'./temp/'.$id.'_nome.png" -i "'.'./temp/'.$id.'_tempo.png" -i "_assets/p1_02.mp4" -c:v libx264 -crf 5 -r 25 -shortest -pix_fmt yuv444p -filter_complex "[3]chromakey=0x00FF00:0.27:0.1[ckout];[0][1]overlay=x=464:y=489,trim=start=0:end=4,setpts=PTS-STARTPTS[nscr];[nscr][2]overlay=x=823:y=684[ntscr];[ntscr][ckout]overlay[out]" -map "[out]" "'.'./temp/'.$id.'_f1.mp4" 2>&1', $o, $r);
                break;
                
            case 2:
                exec('./ffmpeg -y -i "_assets/white_BG.png" -i "'.'./temp/'.$id.'_nome.png" -i "'.'./temp/'.$id.'_tempo.png" -i "_assets/p1_03.mp4" -c:v libx264 -crf 5 -r 25 -shortest -pix_fmt yuv444p -filter_complex "[3]chromakey=0x00FF00:0.27:0.1[ckout];[0][1]overlay=x=464:y=489,trim=start=0:end=4,setpts=PTS-STARTPTS[nscr];[nscr][2]overlay=x=823:y=684[ntscr];[ntscr][ckout]overlay[out]" -map "[out]" "'.'./temp/'.$id.'_f1.mp4" 2>&1', $o, $r);
                break;
        }
        
        //Checa se o vídeo foi gerado.
        //Caso sim, ele aumenta a barra de progresso na página principal,
        //em caso de falha, ele apaga os assets e gera o erro

        if($r == 0 && file_exists('./temp/'.$id.'_f1.mp4') == true)
            echo('<script>$("#LOADING_BAR").width("11%");$("#LOADING_BAR")[0].ariaValueNow = 11; $("#LOADING_BAR")[0].innerText = "11%"</script>');
        else
        {
            unlink('./temp/'.$id.'_nome.png');
            unlink('./temp/'.$id.'_tempo.png');

            unlink($_GET['i0']);
            unlink($_GET['i1']);
            unlink($_GET['i2']);
            unlink($_GET['i3']);
                        
            //header("Location: error.php");
            
            //Vai pra página de erro
            $str = bin2hex($o);
            echo('<script>$ ("#ERRORPHP").click(function() { window.location = "error.php?e=5&r='.$r.'&o='.$str.'"; }); </script>');
            echo('<script>$("#ERRORPHP").trigger("click");</script>');
            
            die();
        }
        
        echo('<script>$("#LOADPHP_02").trigger("click");</script>'); //Clica no botão da próxima etapa
        die();
    }
?>
