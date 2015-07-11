# Flickr Test

## Apache 2 Virtual Host Configu
```
<VirtualHost *:80>
    ServerName flickr-test.dev

    ServerAlias flickr-test.local.net
    ServerAdmin purinda@gmail.com    DocumentRoot /home/purinda/Projects/flickr-test/public    <Directory "/home/purinda/Projects/flickr-test/public/">              # New directive needed in Apache 2.4.3:
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
