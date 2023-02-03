FROM php:7.4-apache
RUN apt-get update && \
    docker-php-ext-install mysqli

RUN apt-get install default-mysql-client openssh-server sudo vim  supervisor -y
RUN useradd -m -p $(echo monkeyisland4 | openssl passwd -1 -stdin) Guybrush

# Habilitar la conexión SSH
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN systemctl enable ssh

RUN echo "Guybrush ALL=(ALL) SETENV: NOPASSWD: /home/Guybrush/find_chest.sh" >> /etc/sudoers
COPY find_chest.sh /home/Guybrush/find_chest.sh
RUN chmod 755 /home/Guybrush/find_chest.sh

RUN echo "I Found the Treasure of Mêlée Island and all I got was this Stupid File" >> /root/chest.txt 


COPY *.php /var/www/html/
COPY *.html /var/www/html/
COPY *.gif /var/www/html/
RUN mkdir /var/www/html/upload && chmod 777 /var/www/html/upload


RUN mkdir /var/run/sshd
RUN chmod 0755 /var/run/sshd

RUN mkdir /chest
COPY chest.txt /chest/
RUN chmod 600 /chest

COPY supervisord.conf /etc/supervisor/conf.d/
CMD ["/usr/bin/supervisord","-c","/etc/supervisor/conf.d/supervisord.conf"]
