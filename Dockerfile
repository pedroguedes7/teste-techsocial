# Use a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar dependências necessárias para o Composer
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        git \
        unzip \
        curl

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar o código-fonte da aplicação para o contêiner
COPY . /var/www/html

# Instalar as dependências do Composer
RUN composer install --no-scripts --no-autoloader

# Configurar Apache para usar o diretório public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's|<Directory /var/www/html>|<Directory /var/www/html/public>|g' /etc/apache2/apache2.conf

# Habilitar módulo de reescrita do Apache
RUN a2enmod rewrite

# Reiniciar Apache para aplicar as configurações
RUN service apache2 restart

# Permissões (se necessário)
RUN chown -R www-data:www-data /var/www/html

# Expor a porta do Apache
EXPOSE 80

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]
