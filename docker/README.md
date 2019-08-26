# Template MicroServices - PHP

Bom, a primeira coisa que você precisa saber é *docker*, sabe? 
então let's go!



# Como Usar?
Dentro desse diretório temos diversos tipos de arquivos com extensão **.yml**.

 - **docker-compose-scale.yml**

 é o docker-compose para ser escalado, possui as mesmas configurações, porém usa o docker swarm.
 - **docker-compose-simple.yml**
 
esse aqui é o mais simples, para você usar localmente, ou subir pequenas aplicações que não precisarem ser escaladas futuramente.

## Docker Swarm

**docker swarm**, é o cara que faz todo mágica acontecer, escala sua aplicação.

primeiro precisamos dizer que a maquina irá trabalhar com ele, então usamos o seguinte comando:

    docker swarm init

Será retornado um token para você utilizar nos workers, que serão as máquinas que dividirão a carga com essa maquina, **guarde esse token**.

exemplo de token (não copie e cole esse):

    docker swarm join --token SWMTKN-1-68inc641462hc6g0pvgfiq2sam0oxjfdfu6fsndkin1lp3yp38-bua3rdwprvwj7owmelr1vhr3o 192.168.1.154:2377

feito isso para iniciar o seu swarm é só usar esse comando: 

    docker stack deploy -c docker-compose.yml nomedoservico

 Legal, sua maquina já está rodando o docker swarm.
 
# Docker Compose 

para iniciar um serviço simples você vai utilizar o:
 **docker-compose-simple.yml**

renomei-o para **docker-compose.yml**, e após isso:

    docker-compose up

# Importante

lembre de mudar as variáveis e as portas do seu arquivo **docker-compose** que será feito o deploy.

na aplicação mude a linha dos volumes, e a porta externa, no caso a 81, se ela não estiver em uso mantenha ela, caso contrário coloque outra.


    aplicacao:
    
    container_name:  'application_microservice'
    
    image:  leolegends/microservices_php:lates
    
    ports:
    
    - 81:80
    
    volumes:
    
    - "/var/www/corebiz/unicred_classificados/:/app"


assim também para o mysql e o phpmyadmin.

