Installation:
0. Rename directory to news-article
1. Using apache web server(XAMPP)
2. Create New Database (I'm pick "news" as name)
3. Copy and paste SQL script to your new database(article.sql)
4. if there is no .htaccess in root directory, copy and paste this script below:
    <IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /news-article
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?/$1 [L]
    </IfModule>

    <IfModule !mod_rewrite.c>
    ErrorDocument 404 /index.php
    </IfModule>

