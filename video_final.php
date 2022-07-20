<?php
    $id = '';
    define('COOKIE_NAME', 'HM_VIDEO_DONE');

    //Checa se o ID do get é valido - se há um vídeo gerado realmente
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        
        //Se não houver vídeo, mostra erro
        if(file_exists('./temp/'.$_GET['id'].'_final.mp4') == false)
        {
            header("header: error.php?e=12");
            die();
        }
        
        //Senão, gera um cookie com a ID da sessão
        setcookie(COOKIE_NAME, $id, time() + (24 * 3600));
    }
    else
    {
        header("Location: error.php?e=13"); //Sem ID no GET
    }
    
?>

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
        <div class="row justify-content-center">
            <div class="col-8 text-center mt-3">
                <h3 class="font-mont-light text-white mb-4 mt-2">Seu vídeo ficou pronto! Assista, compartilhe e comemore nossos 45 anos de sucesso!</h3>           
                <?php
                    echo('<video class="img-fluid" src="./temp/'.$id.'_final.mp4" width="540" height="540" controls type="video/mp4"></video>');
                ?>
                
                <h5 class="font-mont-light text-white mt-4">Obrigado por fazer parte da nossa história</h5>
                <br>
            </div>
            <div class="col-5 text-center">
                <a <?php echo('href="./temp/'.$id.'_final.mp4?=t'.time().'"') ?> class="btn form-control font-hmred bg-warning font-mont-medium" download>Baixar vídeo</a>
                <hr class="bg-warning" style="margin-top: 30px">
                <a href="index.php" class="btn form-control font-hmblack bg-light font-mont-medium mt-3 mb-5">Voltar para a tela inicial</a>
            </div>
        </div>
    </div>
    <footer class="container-fluid mem-footer" id="FOOTER">
        <div class="row justify-content-center align-items-center">
           <div class="col-6 align-items-center mt-5 mb-5">
               <div class="d-flex flex-wrap justify-content-center align-content-center">
                       <img alt="" style="max-width: 100%" class="img-fluid" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF0AAAAwCAMAAABExYZ1AAAAkFBMVEVHcEz///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////9mVHhuAAAAL3RSTlMA5zruP+mdTq5uejlz/heNHhFnRmACNaT0BSQL3izJgDvCWJbY0LjskfnlU0yFsZLjo0AAAAFnSURBVFjD7ddtb4IwEAdwnCjiLCDPAqii4JjTfv9vNwE6e1dEQkz2pveul39/NMYrQaFcqcq7S+pSl7rU/0E3fmzddoz+fbHq3kPRBjTX/iXLVMt7rmsH0qy2esxC2upRdSiah01oakYstHHZztnR79aj4m9F6MRtQwsu9HU/97V8rInZnF898VRgdOh6SUHNvQ7dT2BoW0k7ApuJJehXiuso6mqIQ3msmMLOJEb6XIhQssf67Symgp3YoybSu6rA+uAq1691YozVqf1ap+5o/TZAN0fryQC9GK2TGOkzO01t+KfIBZ2Ye0vbYmuhWQ46hQX173rCjAnfOwm6VoU8JO3qwViCXgr1SzP4GXgi1oP2xgrxGapn5nzTBzpZtxvBj4V1dvkcxJlW4Mx+AP3MrruwT2dvgYBvrtqm/lyfMH3ap3+2IXBvLKUudalLXepSf5euceUw3UFNn0+1L18v5ZvsGyECyV9I3bab/lL6VAAAAABJRU5ErkJggg==" decoding="async">
               </div>
            </div>
        </div>
    </footer>
</body>
</html>