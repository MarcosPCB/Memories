# Memories - Custom Video Maker
HM Memories - projeto de endomarketing celebrando os 45 anos da empresa

O projeto utiliza o FFmpeg com libx264 para renderizar os videos.
O usuário carrega 4 fotos, seleciona a área a qual pertence na empresa, o ano que começou e insere o seu nome. Depois, o sistema cria um video customizado  com as fotos e informações inseridas.

Este projeto foi otimizado para um servidor mais simples, visto que era somente para o público interno da empresa. Com isso, o processo de renderização foi dividido em partes para que o servidor não entrasse em timeout enquanto esperava retorno do programa. Portanto, o processo de renderização que poderia ser mais rápido, pode levar de 2 a 5 minutos, dependendo.

Além disso, o projeto foi criado pensando em mobile, aqui no caso, esta restrição está desabilitada.

OBS: Neste repositório, só está o código, os assets (videos, imagens e fontes) não estão dispoíveis.

# Features

- Suporta os formatos BMP, HEIC, JPG, JPEG, PNG, TIF e TIFF
- As fotos podem ser de qualquer tamanho, desde que sejam menores que 4 MBs
- Ele mantém a proporção das fotos no vídeo
- O vídeo é gerado em 1080p em alta qualidade (formato quadrado)
- Ele gera em tempo real o vídeo (2 a 5 minutos, dependendo do servidor)
- Cada sessão gera uma ID única, para caso o usuário gere o vídeo, porém, saia da página, ao retornar à plataforma, avisa que há um vídeo já gerado
- As fotos carregadas são apagadas após a geração do vídeo
- Corrige as fotos com dados EXIF, tiradas de aparelhos mobile

# Release

https://work-space.sourceforge.io/hmmem/index.php

Restrição mobile: https://work-space.sourceforge.io/hmmem/index.php?mobile
