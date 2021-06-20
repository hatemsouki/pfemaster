FROM ubuntu
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update 

#Instalando apache
RUN apt-get install -y apache2

#removendo o arquivo index.html porque por padrão o apache procura ele para renderizar como página principal, como nós queremos a tela
# de instalação do GLPI é interessante apagar o index.html
RUN rm /var/www/html/index.html 

#Instalando PHP e dependencias necessárias para GLPI
COPY ./pfe var/www/html


RUN apt-get install -y php libapache2-mod-php php-curl php-mysqli php-mbstring php-gd php-gd php-simplexml php-intl

#Copiando a pasta do GLPI para dentro do container
RUN chown -R www-data:www-data /var/www/html

EXPOSE  80

#Inciando o apache
ENTRYPOINT  ["/usr/sbin/apachectl", "-D", "FOREGROUND"]