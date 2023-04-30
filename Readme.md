## Projeto para fins de teste técnico na empresa Kabum

### Passos para executar o projeto

1 - Faça o download do projeto em sua máquina

2 - Execute o comando do docker para subir o ambiente em sua máquina

    `sudo docker compose up -d`

3 - Entre no conteiner do docker para fazer a instalação das dependencias 

    `docker exec -if kabum-apache bash`

4 - Execute o seguinte comando para instalação das dependencias 

    `composer install`

5 - Na raiz do projeto existe uma pasta chamada **database**, escolha uma IDE para visualizar o seu banco de dados criado pelo container e rode o script citado na pasta.

5.1 - Caso tenha algum problema para acessar o banco de dados criado pelo docker, no arquivo **docker-compose.yml** existe as informações para acesso em environment e logo em seguida a **porta (3333)**

6 - Nesse momento o projeto já deve estar 100% em funcionamento, basta apenas criar um novo usuário e navegar pelo projeto.


## Técnologias utilizadas

#### - PHP 8.2
#### - MYSQL
#### - Javascript/Jquery
#### - HTML 5
#### - CSS 3
#### - BOOTSTRAP 5 (estilização)
#### - GIT para versionamento
#### - Docker para Ambiente
 
