FROM ubuntu:latest

RUN apt-get update
RUN apt-get install -y apache2

COPY index.html mycss.css myjs.js /var/www/html

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
