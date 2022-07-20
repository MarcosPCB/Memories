<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    
    //OPCIONAL VIA GET 'mobile'
    //Checa se o usuário está em um aparelho celular ou não
    //Se não estiver, joga ele para outra página

    if(isset($_GET['mobile']))
    {
        require_once 'Mobile_Detect.php'; 

        $detect = new Mobile_Detect;
        $isMobile = $detect->isMobile();
        $isTablet = $detect->isTablet();

        if($isMobile == false &&  $isTablet == false)
        {
            header('Location: desktop.html'); //Página HTML caso ele esteja em um desktop
            die();
        }
    }

    //Gera um código de identificação para esta sessão
    //Caso um vídeo já tenha sido feito, é possível detectar
    define('COOKIE_NAME', 'HM_VIDEO_DONE');

    $id = bin2hex(random_bytes(16));
    echo('<script>var ID = "'.$id.'";</script>');
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>

<body class="BG-MEM">
    <div id="ANIM45" class="d-flex flex-wrap justify-content-center align-items-center BG-MEM fade-tran" style="position: absolute; top: 0; width: 100%; height: 100%">
        <img src="_assets/Selo_45.png" class="wh-tran" id="SELO">
    </div>
    <div class="container-fluid" id="MAIN">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 justify-content-center bg-white" style="height: auto" id="TITLE">
                <div class="d-flex flex-wrap justify-content-center align-content-center mt-3">
                    <img src="_assets/memories.svg" id="LOGO" style="min-width: 64px; width: 100%; max-width: 256px; max-height: 100px">
                </div>
                <hr class="font-hmred">
                <h3 class="text-center font-mont-medium font-hmblack">Você faz parte dos 45 anos de sucesso
</h3>
                <br>
            </div>
            <div class="col-12 col-lg-4">
                <div class="d-flex flex-wrap justify-content-center align-content-center">
                    <img class="img-fluid m-auto" id="EME" src="_assets/Eme.png">
                </div>
            </div>
            <div class="col-11 col-lg-8 mt-4">
                <h4 class="font-mont-light text-white text-lg-start text-center">Preencha o formulário abaixo e crie um 
vídeo personalizado para participar da nossa comemoração!
</h4>
                <br>
                <form method="POST" id=SENDFORM enctype="multipart/form-data">
                    <div class="row justify-content-lg-start justify-content-center align-items-center">
                        <div class="col-11 form-group">
                            <label for="nome" class="form-label text-md-start text-center text-white font-mont-medium">Qual o seu primeiro nome?</label>
                            <input class="form-control font-mont-medium" maxlength="12" id="FORM_NAME" type="text" name="nome">
                            <br>
                        </div>
                        <div class="col-11 form-group">
                            <label for="tempo" class="form-label text-md-start text-center text-white font-mont-medium">Em que ano você entrou na HM?</label>
                            <select class="form-control form-select font-mont-medium" id="FORM_YEAR" type="number" name="tempo">
                                <option selected>2021</option>
                            <?php
                                for($i = 2020; $i >= 1976; $i--)
                                    echo('<option>'.$i.'</option>');
                            ?>
                            </select>
                            <br>
                        </div>
                        <div class="col-11 form-group">
                            <label for="area" class="form-label text-md-start text-center text-white font-mont-medium">Qual departamento você trabalha? </label>
                            <select class="form-control form-select font-mont-medium" id="FORM_AREA" name="area" >
                                <option>Obras</option>
                                <option selected>Escritório</option>
                                <option>Corretores</option>
                            </select>
                            <br>
                        </div>
                        <div class="col-11">
                            <label for="file1" class="font-mont-medium form-label text-white text-md-start text-center">Precisamos de 4 fotos suas na HM ou com seus colegas da HM.</label>
                        </div>
                        <div class="col-11 col-md-5 mb-5 vertical-input-group">
                            <div class="input-group">
                                <input class="form-control font-mont-medium" id="FILESCHECK1" type="file" name="file1" accept=".png, .jpg, .bmp, .heic, .heif, .tif, .tiff, .jpeg">
                                <button class="btn btn-primary border-light bg-light"  style="display: none;" type="button" id="FILECANCEL1"><i class="text-danger bi bi-trash-fill"></i></button>
                            </div>
                            <div class="input-group">
                                <div id="FILEPIC1" class="d-flex flex-wrap form-control justify-content-center align-content-center p-0" style="display: none;">
                                    <img class="img-fluid" style="display: none; max-width: 128px; max-height: 128px;" src="">
                                </div>
                            </div>
                            <div class="progress" style="margin-top: 10px;">
                                <div id="PROGRESS1" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div> 
                        </div>
                        <div class="col-11 col-md-1"></div>
                        <div class="col-11 col-md-5 mb-5 vertical-input-group">
                           <div class="input-group">
                                <input class="form-control font-mont-medium" id="FILESCHECK2" type="file" name="file2" accept=".png, .jpg, .bmp, .heic, .heif, .tif, .tiff, .jpeg">
                                <button class="btn btn-primary border-light bg-light" type="button" id="FILECANCEL2" style="display: none; border-radius: 2px;"><i class="text-danger bi bi-trash-fill"></i></button>
                            </div>
                             <div class="input-group">
                                <div id="FILEPIC2" class="d-flex flex-wrap form-control justify-content-center align-content-center p-0" style="display: none;">
                                    <img class="img-fluid" style="display: none; max-width: 128px; max-height: 128px;" src="">
                                </div>
                            </div>
                            <div class="progress" style="margin-top: 10px;">
                                <div id="PROGRESS2" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                        <div class="col-11 col-md-5  mb-5 vertical-input-group">
                            <div class="input-group">
                                <input class="form-control font-mont-medium" id="FILESCHECK3" type="file" name="file3" accept=".png, .jpg, .bmp, .heic, .heif, .tif, .tiff, .jpeg">
                                <button class="btn btn-primary border-light bg-light" type="button" id="FILECANCEL3" style="display: none; border-radius: 2px;"><i class="text-danger bi bi-trash-fill"></i></button>
                            </div>
                             <div class="input-group">
                                <div id="FILEPIC3" class="d-flex flex-wrap form-control justify-content-center align-content-center p-0" style="display: none;">
                                    <img class="img-fluid" style="display: none; max-width: 128px; max-height: 128px;" src="">
                                </div>
                            </div>
                            <div class="progress" style="margin-top: 10px;">
                                <div id="PROGRESS3" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                        <div class="col-11 col-md-1"></div>
                        <div class="col-11 col-md-5 mb-5 vertical-input-group">
                           <div class="input-group">
                                <input class="form-control font-mont-medium" id="FILESCHECK4" type="file" name="file4" accept=".png, .jpg, .bmp, .heic, .heif, .tif, .tiff, .jpeg">
                                <button class="btn btn-primary border-light bg-light" type="button" id="FILECANCEL4" style="display: none; border-radius: 2px;"><i class="text-danger bi bi-trash-fill"></i></button>
                            </div>
                             <div class="input-group">
                                <div id="FILEPIC4" class="d-flex flex-wrap form-control justify-content-center align-content-center p-0" style="display: none;">
                                    <img class="img-fluid" style="display: none; max-width: 128px; max-height: 128px;" src="">
                                </div>
                            </div>
                            <div class="progress" style="margin-top: 10px;">
                                <div id="PROGRESS4" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                        
                        <div class="col-11 mb-5" style="padding-left: 20%; padding-right: 20%;">
                            <input class="form-control btn-primary bg-warning font-mont-medium font-hmblack border-warning" type="button" onClick="sendForm()" value="Criar vídeo">
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="container-fluid mem-footer" id="FOOTER">
        <div class="row justify-content-center align-items-center">
           <div class="col-6 align-items-center mt-5 mb-5">
               <div class="d-flex flex-wrap justify-content-center align-content-center">
                <!-- Unica forma do bootstrap parar de encher o saco com o logo da HM -->
                       <img alt="" style="max-width: 100%" class="img-fluid" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF0AAAAwCAMAAABExYZ1AAAAkFBMVEVHcEz///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////9mVHhuAAAAL3RSTlMA5zruP+mdTq5uejlz/heNHhFnRmACNaT0BSQL3izJgDvCWJbY0LjskfnlU0yFsZLjo0AAAAFnSURBVFjD7ddtb4IwEAdwnCjiLCDPAqii4JjTfv9vNwE6e1dEQkz2pveul39/NMYrQaFcqcq7S+pSl7rU/0E3fmzddoz+fbHq3kPRBjTX/iXLVMt7rmsH0qy2esxC2upRdSiah01oakYstHHZztnR79aj4m9F6MRtQwsu9HU/97V8rInZnF898VRgdOh6SUHNvQ7dT2BoW0k7ApuJJehXiuso6mqIQ3msmMLOJEb6XIhQssf67Symgp3YoybSu6rA+uAq1691YozVqf1ap+5o/TZAN0fryQC9GK2TGOkzO01t+KfIBZ2Ye0vbYmuhWQ46hQX173rCjAnfOwm6VoU8JO3qwViCXgr1SzP4GXgi1oP2xgrxGapn5nzTBzpZtxvBj4V1dvkcxJlW4Mx+AP3MrruwT2dvgYBvrtqm/lyfMH3ap3+2IXBvLKUudalLXepSf5euceUw3UFNn0+1L18v5ZvsGyECyV9I3bab/lL6VAAAAABJRU5ErkJggg==" decoding="async">
               </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="VIDEOPOPUP" tabindex="-1" aria-labelledby="VIDEOPOPUP-Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-mont-bold" id="VIDEOPOPUP-Label">Vídeo pronto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body font-mont-medium">
            Oi de novo!<br>
Eu vi aqui que você já criou um vídeo pra comemorar nossos 45 anos. Você quer vê-lo ou baixá-lo novamente?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary font-mont-medium" data-bs-dismiss="modal">Fechar</button>
            <a type="button" class="btn btn-primary bg-danger border-danger font-mont-medium"
            <?php
            //Caso haja um cookie com ID e o ussuário aceite ver o vídeo novamente, carrega a página
                if(isset($_COOKIE[COOKIE_NAME]))
                    echo('href="video_final.php?id='.$_COOKIE[COOKIE_NAME].'"');
            ?> >Ir para o vídeo</a>
          </div>
        </div>
      </div>
    </div>
</body>
    
<!--Carrega a biblioteca para conversão HEIC-->
<script type="module" src="img_utils/heic2any.js"></script>
<script>
    var imgs = [ '', '', '', '' ]; //Nome dos arquivos
    var imgs_fields = [ 0, 0, 0, 0 ]; //Matriz de validação
    var imgs_selected = 0; //Número de imagens selecionadas
    
    $('#MAIN').hide(); //Esconde a tela principal para que a animação de entrada seja executada
    
    var popup = document.getElementById('VIDEOPOPUP');
    
    //Roda a animação
    document.getElementById('SELO').addEventListener('animationend', function(e)
    {
        document.getElementById('ANIM45').style.opacity = "0";
        $('#MAIN').show();
    });
    
    document.getElementById('ANIM45').addEventListener('transitionend', function(e)
    {
        $('#ANIM45').width(0).height(0);
        $('#ANIM45').hide();
        //Checa se foi gerado um cookie de conclusão de vídeo e mostra o popup
        <?php
            if(isset($_COOKIE[COOKIE_NAME]))
                echo('$("#VIDEOPOPUP").modal("show");');
        ?>
    });

    //
    //
    //Envio de formulário
    //
    //
    function sendForm()
    {   
        //Checagem básica dos campos
        if($('#FORM_NAME').val().length == 0 || $('#FORM_YEAR').val().length == 0)
        {
            alert('Por favor, preencha todos os campos!');
            return false;
        }
        
        if(parseInt($('#FORM_YEAR').val()) < 1976 || parseInt($('#FORM_YEAR').val()) > 2021)
        {
            alert('Insira um ano entre 1976 e 2021');
            return false;
        }
        
        if(imgs_selected < 4 || imgs_fields[0] == 0 || imgs_fields[1] == 0 || imgs_fields[2] == 0 || imgs_fields[3] == 0)
        {
            alert("Selecione 4 fotos para poder criar o vídeo!");
            return false;
        }
        
        //Identifica a área selecionada
        var area = 0;
        
        switch($('#FORM_AREA').val())
        {
            case 'Obras':
                area = 0;
                break;
            
            case 'Escritório':
                area = 1;
                break;
                
            case 'Corretores':
                area = 2;
                break;
        }
        
        //Carrega o ano
        var decade = parseInt($('#FORM_YEAR').val());
        
        window.location.href = "video.php?id=" + ID + "&area=" + area + "&year=" + decade + "&name=" + encodeURI($('#FORM_NAME').val()) + "&img00=" + imgs[0] + "&img01=" + imgs[1] + "&img02=" + imgs[2] + "&img03=" + imgs[3]; //Carrega a página para geração do vídeo customizado
        
        return true;
    }
    
    //
    //
    //Funções para carregamento e validação de imagens
    //Funções para deletar  as imagens carregadas
    //
    //
    for(var i = 1; i <= 4; i++)
    {
        //Deletar imagem
        var str = '#FILECANCEL' + i;
        $(str).on('click', function()
        {
            i  = this.id[this.id.length - 1];
            $.ajax(
            {
                url: 'img_utils/image_deleter.php?f=' + imgs[parseInt(i)], //Página para deletar
                type: 'POST',

                data: new FormData($('#SENDFORM')[0]),

                cache: false,
                contentType: false,
                processData: false,

                //Reseta as informações do campo da imagem referente
                success: function(e)
                {
                    $('#FILECANCEL' + i).hide();
                    $('#FILESCHECK' + i).val('');
                    
                    //Infos de progresso
                    $('#PROGRESS' + i)[0].ariaValueNow = 0;
                    $('#PROGRESS' + i)[0].ariaValueMax = 100;
                    $('#PROGRESS' + i)[0].innerText = '0%';
                    $('#PROGRESS' + i).width('0%');
                    
                    //Thumbnail da imagem
                    $('#FILEPIC' + i).hide();
                    $($('#FILEPIC' + i)[0].children[0]).hide();
                    
                    //Reseta as devidas variaveis e remove 1 do contador
                    imgs[parseInt(i) - 1] = '';
                    
                    imgs_selected--;
                    imgs_fields[parseInt(i) - 1] = 0;
                },
            });
        });
        
        //Carregar imagem selecionada e valida-la
        str = '#FILESCHECK' + i;
        $(str).on('change', function()
        {
            var file = this.files[0];
            
            //Checagens básicas

            //Checa se o nome não é muito grande
            if(file.name.length > 240)
            {
                alert('Nome da imagem muito grande!');
                $('#FILESCHECK' + i).val('');
                return false;
            }
            
            //Checa o tamanho da imagem - 4 MB no máximo para não sobrecarregar o servidor
            if(file.size > 1024 * (4 * 1024)) //4 MBs MAX
            {
                alert('Tamanho máximo permitido para a imagem são 4 MBs!');
                $('#FILESCHECK' + i).val('');
                return false;
            }
            
            //Checa a extensão da imagem
            if(file.type != 'image/jpeg' && file.type != 'image/bmp' && file.type != 'image/x-windows-bmp' && file.type != 'image/png' && file.type != 'image/tiff' && file.name.split('.').pop().toLowerCase() != 'heic' && file.name.split('.').pop().toLowerCase() != 'heif')
            {
                alert('Formato de imagem não suportado, utilize imagens BMP, HEIC, HEIF, JPG, JPEG, PNG, TIF ou TIFF!');
                $('#FILESCHECK' + i).val('');
                return false;
            }   
            
            i  = this.id[this.id.length - 1];
            
            $.ajax(
            {
                
                url: 'img_utils/image_uploader.php?i=' + ID + '&n=' + i, //Página para subir a imagem no servidor
                type: 'POST',

                data: new FormData($('#SENDFORM')[0]),

                cache: false,
                contentType: false,
                processData: false,

                //Carrega a imagem
                xhr: function()
                {
                    var Xhr = $.ajaxSettings.xhr();

                    if(Xhr.upload)
                    {
                        Xhr.upload.addEventListener('progress', function(e)
                        {
                            //Calcula e modifica a barra de progresso
                            if(e.lengthComputable)
                            {
                                //Caso seja uma imagem em HEIC ou HEIF - Apple - a info de carregamento é diferente
                                if(file.name.split('.').pop().toLowerCase() == 'heic' || file.name.split('.').pop().toLowerCase() == 'heif')
                                {
                                    $('#PROGRESS' + i)[0].ariaValueNow = e.loaded / 2;
                                    $('#PROGRESS' + i)[0].ariaValueMax = e.total;
                                    $('#PROGRESS' + i)[0].innerText = (((e.loaded / 2) / e.total) * 100).toFixed(1) + '%';
                                    $('#PROGRESS' + i).width($('#PROGRESS' + i)[0].innerText);
                                }
                                else
                                {
                                    $('#PROGRESS' + i)[0].ariaValueNow = e.loaded;
                                    $('#PROGRESS' + i)[0].ariaValueMax = e.total;
                                    $('#PROGRESS' + i)[0].innerText = ((e.loaded / e.total) * 100).toFixed(1) + '%';
                                    $('#PROGRESS' + i).width($('#PROGRESS' + i)[0].innerText);
                                }
                            }
                        }, false);
                    }

                    return Xhr;
                },

                //Em caso  de sucesso
                success: function(e)
                {
                    if(e != 'false')
                    {
                        //Modifica as variaveis necessárias e mostra a Thumbnail
                        imgs[parseInt(i) - 1] = e;
                        
                        $('#FILEPIC' + i).show();
                        $($('#FILEPIC' + i)[0].children[0]).show();
                        
                        var t = new Date().getTime();  
                        
                        $($('#FILEPIC' + i)[0].children[0]).attr('src', e + '?=t' + t); //Atribui data e hora para o navegador não colocar a thumb em cache
                        
                        imgs_fields[parseInt(i) - 1] = 1;
                        imgs_selected++;
                        
                        //Se for uma imagem em HEIC ou HEIF - Apple - ela tem que ser convertida
                        if(e.split('.').pop().toLowerCase() == 'heic' || e.split('.').pop().toLowerCase() == 'heif')
                        {
                            fetch(e)
                            .then((res) => res.blob())
                            .then((blob) => heic2any({ blob, toType: "image/jpeg", quality: 1.0, })) //Converte para jpeg e joga no blob
                            .then((r) =>
                            {
                                $.ajax(
                                {
                                    type: 'POST',
                                    url: 'img_utils/heic2jpg_uploader.php?i=' + ID + '&n=' + i, //Página para  carregar a imagem convertida no blob e apagar o HEIC/HEIF
                                    data: r,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    
                                    //Barra de progresso
                                    xhr: function()
                                    {
                                        var Xhr = $.ajaxSettings.xhr();

                                        if(Xhr.upload)
                                        {
                                            Xhr.upload.addEventListener('progress', function(e)
                                            {
                                                if(e.lengthComputable)
                                                {
                                                    $('#PROGRESS' + i)[0].ariaValueNow = (e.total / 2) + (e.loaded / 2);
                                                    $('#PROGRESS' + i)[0].ariaValueMax = e.total;
                                                    $('#PROGRESS' + i)[0].innerText = ((((e.total / 2) + (e.loaded / 2)) / e.total) * 100).toFixed(1) + '%';
                                                    $('#PROGRESS' + i).width($('#PROGRESS' + i)[0].innerText);
                                                }
                                            }, false);
                                        }

                                        return Xhr;
                                    },
                                    
                                    //Em caso de sucesso
                                    success: function(v)
                                    {
                                        if(v != false)
                                        {
                                            console.log("Success uploaded blob data: " + v);

                                            t = new Date().getTime();  
                                            $($('#FILEPIC' + i)[0].children[0]).attr('src', v + '?=t' + t); //Mostra a thumb e atribui data e hora para o navegador não jogar em cache
                                            imgs[parseInt(i) - 1] = v;
                                        }
                                        else
                                        {
                                            //Em caso de falha, reseta o campo
                                            //Como estava no blob, não é preciso apagar a imagem, nada foi subido no servidor
                                            //O HEIC/HEIF já foi apagado durante a conversão

                                            alert('Não foi possível subir a sua foto!');
                                            console.log('ERROR: converted HEIC to JPG blob failed to be uploaded');

                                            $('#PROGRESS' + i)[0].ariaValueNow = 0;
                                            $('#PROGRESS' + i)[0].ariaValueMax = 100;
                                            $('#PROGRESS' + i)[0].innerText = '0%';
                                            $('#PROGRESS' + i).width('0%');
                                            $('#FILESCHECK' + i).val('');

                                            if(imgs_fields[i - 1] > 0)
                                            {
                                                $('#FILESCHECK' + i).val('');
                                                $('#FILECANCEL' + i).hide();

                                                $('#FILEPIC' + i).hide();
                                                $($('#FILEPIC' + i)[0].children[0]).hide();

                                                imgs_selected--;

                                                imgs_fields[parseInt(i) - 1] = 0;
                                                imgs[parseInt(i) - 1] = '';
                                            }
                                        }
                                    },
                                    
                                    //Em caso de falha, reseta o campo
                                    //Como estava no blob, não é preciso apagar a imagem, nada foi subido no servidor
                                    //O HEIC/HEIF já foi apagado durante a conversão

                                    error: function()
                                    {
                                        alert('Não foi possível subir a sua foto!');
                                        console.log('ERROR: converted HEIC to JPG blob failed to be uploaded');

                                        $('#PROGRESS' + i)[0].ariaValueNow = 0;
                                        $('#PROGRESS' + i)[0].ariaValueMax = 100;
                                        $('#PROGRESS' + i)[0].innerText = '0%';
                                        $('#PROGRESS' + i).width('0%');
                                        $('#FILESCHECK' + i).val('');

                                        if(imgs_fields[i - 1] > 0)
                                        {
                                            $('#FILESCHECK' + i).val('');
                                            $('#FILECANCEL' + i).hide();

                                            $('#FILEPIC' + i).hide();
                                            $($('#FILEPIC' + i)[0].children[0]).hide();

                                            imgs_selected--;

                                            imgs_fields[parseInt(i) - 1] = 0;
                                            imgs[parseInt(i) - 1] = '';
                                        }
                                    },
                                });
                            })
                            .catch((e) =>
                            {
                                //No caso de não conseguir nem converter a imagem
                                if(typeof e == 'object')
                                {
                                    if(e.code == 2)
                                        alert('Formato inválido. Não foi possível subir a sua imagem!');
                                    else if(e.code == 1)
                                        alert('Imagem HEIC inválida. Não foi possível subir a sua imagem!');
                                    
                                    $('#PROGRESS' + i)[0].ariaValueNow = 0;
                                    $('#PROGRESS' + i)[0].ariaValueMax = 100;
                                    $('#PROGRESS' + i)[0].innerText = '0%';
                                    $('#PROGRESS' + i).width('0%');
                                    $('#FILESCHECK' + i).val('');
                                    
                                    if(imgs_fields[i - 1] > 0)
                                    {
                                        $('#FILESCHECK' + i).val('');
                                        $('#FILECANCEL' + i).hide();

                                        $('#FILEPIC' + i).hide();
                                        $($('#FILEPIC' + i)[0].children[0]).hide();

                                        imgs_selected--;

                                        imgs_fields[parseInt(i) - 1] = 0;
                                        imgs[parseInt(i) - 1] = '';
                                    }
                                }
                                
                                console.log(e);
                                
                            });
                        }
                        
                        $('#FILECANCEL' + i).show();
                    }
                    else
                    {
                        //Reseta o campo caso falhe em carregar a imagem no servidor

                        alert('Não foi possível subir a sua foto!');
                        console.log('ERROR: "false" returned from script');
                        
                        $('#PROGRESS' + i)[0].ariaValueNow = 0;
                        $('#PROGRESS' + i)[0].ariaValueMax = 100;
                        $('#PROGRESS' + i)[0].innerText = '0%';
                        $('#PROGRESS' + i).width('0%');
                        $('#FILESCHECK' + i).val('');
                        
                        if(imgs_fields[i - 1] > 0)
                        {
                            $('#FILESCHECK' + i).val('');
                            $('#FILECANCEL' + i).hide();
                            
                            $('#FILEPIC' + i).hide();
                            $($('#FILEPIC' + i)[0].children[0]).hide();
                            
                            imgs_selected--;

                            imgs_fields[parseInt(i) - 1] = 0;
                            imgs[parseInt(i) - 1] = '';
                        }
                    }
                    
                },

                error: function()
                {
                    //Reseta o campo caso falhe em carregar a imagem no servidor
                    
                    alert('Não foi possível subir a sua foto!');
                    console.log("ERROR: failed to upload image");
                    
                    $('#FILESCHECK' + i).val('');
                    $('#FILELABEL' + i).hide();
                    $('#PROGRESS' + i)[0].ariaValueNow = 0;
                    $('#PROGRESS' + i)[0].ariaValueMax = 100;
                    $('#PROGRESS' + i)[0].innerText = '0%';
                    $('#PROGRESS' + i).width('0%');
                    $('#FILESCHECK' + i).val('');
                    
                    if(imgs_fields[i - 1] > 0)
                    {
                        $('#FILESCHECK' + i).val('');
                        $('#FILECANCEL' + i).hide();
                        
                        $('#FILEPIC' + i).hide();
                        $($('#FILEPIC' + i)[0].children[0]).hide();
                            
                        imgs_selected--;

                        imgs_fields[parseInt(i) - 1] = 0;
                        imgs[parseInt(i) - 1] = '';
                    }
                }
            });
        });
    }
</script>
    
</html>