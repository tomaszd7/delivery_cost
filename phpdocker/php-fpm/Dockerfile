FROM phpdockerio/php74-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.4-mysql php7.4-sqlite3 \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# NPM
#RUN apt-get update && \
#    apt-get install -y --no-install-recommends gnupg && \
#    curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
#    apt-get update && \
#    apt-get install -y --no-install-recommends nodejs && \
#    curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
#    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
#    apt-get update && \
#    apt-get install -y --no-install-recommends yarn && \
#    npm install -g npm


# RUN all as www-data user
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

# add timezone
RUN echo "Europe/Warsaw" > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata

