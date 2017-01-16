# TODO: Too big, use alpine instead
FROM ubuntu

# There's no need to put inside an image more than what is needed.
# TODO: Do we need vim, curl, and all other packages?
# Some resources are cleaned at the end of this command.
# Since every instruction is built as a separate layer, it is important that unneeded resources are removed before moving to the next instruction.
RUN apt-get update && \
    apt-get install -y wget curl vim software-properties-common nginx php7.0 php7.0-fpm php7.0-cli php7.0-curl php7.0-mysql php7.0-mbstring php7.0-xml php7.0-zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN mkdir -p /var/www/

# Don't copy all the files. Select only those you need
COPY public /var/www/laravel-blog/public
COPY storage /var/www/laravel-blog/storage
COPY default /etc/nginx/sites-available/

CMD ["nginx", "-g", "daemon off;"]

# mysql-server-5.7
#    15 - php artisan cache:clear
#    16 - mysql -u root -p (then put your root password)
#    17 - CREATE DATABASE laravel_blog;
#    18 - write exit and tap enter
#    19 - php artisan migrate
#    20 - go to browser you will see the index page
