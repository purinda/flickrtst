# Flickr Test

## Installation

### Step 1
```
git clone git@github.com:purinda/flickrtst.git
```

### Step 2
```
cd flickrtst
composer install
```

### Step 3
Apache configuration
```
<VirtualHost *:80>
    ServerName flickr-test.dev

    ServerAlias flickr-test.local.net
    ServerAdmin purinda@gmail.com    DocumentRoot /<git-clone-location>/public    <Directory "/<git-clone-location>/public/">
        # New directive needed in Apache 2.4.3:
        Require all granted

        DirectoryIndex index.php
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^(.*)$ index.php [QSA,L]
    </Directory>

    # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
    # error, crit, alert, emerg.
    # It is also possible to configure the loglevel for particular
    # modules, e.g.
    LogLevel info

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log common
</VirtualHost>
```

## Tests
You can run tests by running the following command in the project directory.
```
phpunit --bootstrap vendor/autoload.php
```
