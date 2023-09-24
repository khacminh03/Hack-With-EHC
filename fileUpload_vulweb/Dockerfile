FROM php:7.3-apache
RUN mkdir -p /var/www/html/upload && chown -R www-data:www-data /var/www/html/upload
COPY ./ /var/www/html/
# put files
WORKDIR /var/www/html/
COPY ./src .
COPY docker-php.conf /etc/apache2/conf-available/docker-php.conf

# config permission
RUN chown -R root:www-data /var/www/html
RUN chmod 750 /var/www/html
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;
# add write permission for upload file
RUN chmod g+w /var/www/html/upload/
RUN chmod +t -R /var/www/html/
RUN echo "EHC{D0_Y0u_W4nt_T0_J0in_EHC}" > /flag.txt
