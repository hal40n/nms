FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    npm \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Update npm
RUN npm install -g npm

# Set Node.js version
ENV NODE_VERSION=18.16.0

# Install NVM and Node.js
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

# Verify Node.js and npm installation
RUN node --version
RUN npm --version

# Set working directory
WORKDIR /var/www

# Copy the application files
COPY . /var/www
RUN composer install
RUN npm install
RUN npm install tailwindcss
RUN npx tailwindcss init

# Add the UID and GID as build arguments
ARG UID
ARG GID

# Create a user and group with the specified UID and GID
RUN groupadd -g ${GID} hal40n && \
    useradd -u ${UID} -g hal40n -m hal40n

# Change current user to hal40n
USER hal40n

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=hal40n:hal40n . /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
