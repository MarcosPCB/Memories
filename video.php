<html lang="pt-br">
<head>
    <title>HM Memories</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
    <meta name="description" content="Comemore os 45 anos da HM Engenharia com um vídeo especial e descubra sua parte nessa história de sucesso.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="BG-MEM">
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center" style="height: 80vh">
            <div class="col-8 text-center">
                <h4 class="font-mont-light text-white mb-3">Tudo que é bom leva um tempo pra ficar pronto, né? Seu vídeo deve demorar entre 3 a 5 mins pra estar liberado. Aguarde, por favor.</h4>
                
                <div style="display: inline-block; margin-right: 5px; border-radius: 5px; height: 10px; width: 10px; background-color: white; animation: LoadingAnim 1s; animation-iteration-count: infinite"></div>
                <div style="display: inline-block; margin-right: 5px; border-radius: 5px; height: 10px; width: 10px; background-color: white; animation: LoadingAnim 1s; animation-iteration-count: infinite; animation-delay: 0.1s;"></div>
                <div style="display: inline-block; border-radius: 5px; height: 10px; width: 10px; background-color: white; animation: LoadingAnim 1s; animation-iteration-count: infinite; animation-delay: 0.2s;"></div>
            </div>
           
            <div class="col-8 mt-5 mb-5">
                <div class="progress">
                    <div id="LOADING_BAR" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">30%</div>
                </div>
            </div>
            
        </div>
        <a id="LOADPHP_01" style="display: none"></a>
        <!-- LOADPHP_01 é o começo e o fim -->
        <a id="LOADPHP_02" style="display: none"></a>
        <a id="LOADPHP_03" style="display: none"></a>
        <a id="LOADPHP_04" style="display: none"></a>
        <a id="LOADPHP_05" style="display: none"></a>
        <a id="LOADPHP_06" style="display: none"></a>
        <a id="LOADPHP_07" style="display: none"></a>
        <a id="LOADPHP_08" style="display: none"></a>
        <a id="LOADPHP_09" style="display: none"></a>

        <a id="ERRORPHP" style="display: none"></a>
        
    </div>
    <footer class="container-fluid mem-footer w-100 position-absolute bottom-0" id="FOOTER">
        <div class="row justify-content-center align-items-center">
           <div class="col-6 align-items-center mt-5 mb-5">
               <div class="d-flex flex-wrap justify-content-center align-content-center">
                       <img alt="" style="max-width: 100%" class="img-fluid" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF0AAAAwCAMAAABExYZ1AAAAkFBMVEVHcEz///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////9mVHhuAAAAL3RSTlMA5zruP+mdTq5uejlz/heNHhFnRmACNaT0BSQL3izJgDvCWJbY0LjskfnlU0yFsZLjo0AAAAFnSURBVFjD7ddtb4IwEAdwnCjiLCDPAqii4JjTfv9vNwE6e1dEQkz2pveul39/NMYrQaFcqcq7S+pSl7rU/0E3fmzddoz+fbHq3kPRBjTX/iXLVMt7rmsH0qy2esxC2upRdSiah01oakYstHHZztnR79aj4m9F6MRtQwsu9HU/97V8rInZnF898VRgdOh6SUHNvQ7dT2BoW0k7ApuJJehXiuso6mqIQ3msmMLOJEb6XIhQssf67Symgp3YoybSu6rA+uAq1691YozVqf1ap+5o/TZAN0fryQC9GK2TGOkzO01t+KfIBZ2Ye0vbYmuhWQ46hQX173rCjAnfOwm6VoU8JO3qwViCXgr1SzP4GXgi1oP2xgrxGapn5nzTBzpZtxvBj4V1dvkcxJlW4Mx+AP3MrruwT2dvgYBvrtqm/lyfMH3ap3+2IXBvLKUudalLXepSf5euceUw3UFNn0+1L18v5ZvsGyECyV9I3bab/lL6VAAAAABJRU5ErkJggg==" decoding="async">
               </div>
            </div>
        </div>
    </footer>
    <?php
        //A maior parte dos servidores caem em timeout devido ao tempo que leva para renderizar o vídeo,
        //nesse caso, foi necessário dividir o processamento do vídeo em 10 partes, cada uma sendo responsável por uma montagem.
        //Para isso, são craidos 11 botões (LOADPHP) inviseis ao usuário
        //quando um botão é clicado, uma etapa do processo de montagem do vídeo é executada.
        //Sempre have´ra validação, se algo falhar, cancela, apaga e avisa o usuário.
        //A página de erro é carregada com um código no GET que serve para referenciar qual etapa ocorreu o erro - para fins de debug

        //A montagem do vídeo é feita pelo FFmpeg!
        //Sempre convertendo para o formato YUV444P, utilizando o libx264 e  em 25 FPS
        //Portanto, é necessário compilar o libx264 E o FFmpeg para o sistema a ser utilizado.

        $out = "";

        //Primeiro, checa se os valores em GET são validos - ID, a area, o ano, as 4 imagens e o nome
        if(isset($_GET['id']) && isset($_GET['area']) && isset($_GET['year']) && isset($_GET['img00']) && isset($_GET['img01']) && isset($_GET['img02']) && isset($_GET['img03']) && isset($_GET['name']))
        {
            $name = urldecode($_GET['name']).',';
            $id = $_GET['id'];
            
            //Checagem de ano
            if($_GET['year'] >= 1976 && $_GET['year'] <= 1999)
                $decade = 0;
            else if($_GET['year'] >= 2000 && $_GET['year'] <= 2009)
                $decade = 1;
            else if($_GET['year'] >= 2010 && $_GET['year'] <= 2019)
                $decade = 2;
            else if($_GET['year'] >= 2020)
                $decade = 3;
            
            //Para conseguirmos colocar nome e ano,
            //eles são gerados em PNG pelo PHP, salvos no servidor
            //e passados aos devidos scripts

            //Resolução, textoe tamanho da fonte
            $w = 1304;
            $h = 160;
            $txt = ucfirst($name);
            $fsize = 56;

            //Cria um espaço 32-bits no devido tamanho
            $img = imagecreatetruecolor($w, $h);

            //Preenchimento branco para o fundo
            $alpha = imagecolorallocate($img, 255, 255, 255);

            //Preenchimento vermelho para a fonte
            $txtcol = imagecolorallocate($img, 157, 0, 0);

            //Preenche a imagem com a devida cor
            imagefill($img, 0, 0, $alpha);

            //Adiciona transparência
            imagecolortransparent($img, $alpha);
            
            //Renderiza o texto com a cor vermelha no fundo branco
            $t = imagettftext($img, $fsize, 0, 0, $fsize, $txtcol, realpath('hblack.ttf'), $txt);
            
            //Valida a imagem
            if($t == false)
            {
                echo('<script> window.location.href = "error.php?e=0"; </script>');
                die();
            }

            //Gera o PNG da imagem e verifica
            $t = imagepng($img, 'temp/'.$id.'_nome.png');
            
            if($t == false)
            {
                echo('<script> window.location.href = "error.php?e=1"; </script>');
                die();
            }

            //Apaga a imagem da memória
            imagedestroy($img);


            //Agora gera o ano
            //Mesmo esquema
            $w = 500;
            $h = 160;

            $txt = $_GET['year'];
            $fsize = 35;

            $img = imagecreatetruecolor($w, $h);

            $alpha = imagecolorallocate($img, 255, 255, 255);
            $txtcol = imagecolorallocate($img, 157, 0, 0);
            imagefill($img, 0, 0, $alpha);

            imagecolortransparent($img, $alpha);

            $t = imagettftext($img, $fsize, 0, 0, $fsize, $txtcol, realpath('hblack.ttf'), $txt);
            
            //Caso a imagem seja invalida, apaga também o PNG do nome
            if($t == false)
            {
                unlink('temp/'.$id.'_nome.png');
                echo('<script> window.location.href = "error.php?e=2"; </script>');
                die();
            }

            $t = imagepng($img, 'temp/'.$id.'_tempo.png');
            
            //Outra validação, mesmo esquema
            if($t == false)
            {
                unlink('temp/'.$id.'_nome.png');
                echo('<script> window.location.href = "error.php?e=3"; </script>');
                die();
            }
            
            //Apaga da memória
            imagedestroy($img);
            
            //Agora vem a criação do vídeo
            //Essa parte é meio confusa
            //Basicamente ele gera uma linha em JS para o navagedor executar o que acontece quando um clique ocorre nos botões LOADPHP definidos lá e cima
            //Esses botões são escondidos do usuário, mas toda vez que uma parte do vídeo é gerado, o script vai e gera um falso clique no botão, executando a próxima etapa
            //Nem todos os scripts  carregam as imagens, porém, caso o processo falhe, ele precisa saber quais os nomes dos arquivos para serem deletados.

            echo('<script>');

            //Etapa 1
            echo('$(document).ready(function()');
            echo('{ $("#LOADPHP_01").load("video_maker/maker_01.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');

            //Etapa 2
            echo('$("#LOADPHP_02").click(function()');
            echo('{ $("#LOADPHP_02").load("video_maker/maker_02.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');

            //Etapa 3
            echo('$("#LOADPHP_03").click(function()');
            echo('{ $("#LOADPHP_03").load("video_maker/maker_03.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');

            //Etapa 4
            echo('$("#LOADPHP_04").click(function()');
            echo('{ $("#LOADPHP_04").load("video_maker/maker_04.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');

            //Etapa 5
            echo('$("#LOADPHP_05").click(function()');
            echo('{ $("#LOADPHP_05").load("video_maker/maker_05.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');
            
            //Etapa 6
            echo('$("#LOADPHP_06").click(function()');
            echo('{ $("#LOADPHP_06").load("video_maker/maker_06.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');
            
            //Etapa 7
            echo('$("#LOADPHP_07").click(function()');
            echo('{ $("#LOADPHP_07").load("video_maker/maker_07.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');
            
            //Etapa 8
            echo('$("#LOADPHP_08").click(function()');
            echo('{ $("#LOADPHP_08").load("video_maker/maker_08.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');
            
            //Etapa 9
            echo('$("#LOADPHP_09").click(function()');
            echo('{ $("#LOADPHP_09").load("video_maker/maker_09.php?i='.$_GET['id'].'&a='.$_GET['area'].'&d='.$decade.'&i0='.$_GET['img00'].'&i1='.$_GET['img01'].'&i2='.$_GET['img02'].'&i3='.$_GET['img03'].'"); });');

            //Etapa final
            echo('$("#LOADPHP_01").click(function()');
            echo('{ window.location = "video_final.php?id='.$_GET['id'].'"; });');
            
            echo('</script>');
        }
        else
          header("Location: error.php?e=4");

    ?>
</body>

</html>