7. Set document roots of your web server:

   - for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend.dev/`
   - for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend.dev/`
   - for api `/path/to/yii-application/api/web/` and using the URL `http://api.dev/`

   For Apache

       <VirtualHost *:80>
           ServerName frontend.dev
           ServerAlias 127.0.0.1
           DocumentRoot /path/to/yii-application/frontend/web/
           
           <Directory "/path/to/yii-application/frontend/web/">
               RewriteEngine on
               RewriteCond %{REQUEST_FILENAME} !-f
               RewriteCond %{REQUEST_FILENAME} !-d
               RewriteRule . index.php
           </Directory>
       </VirtualHost>
       
       <VirtualHost *:80>
           ServerName backend.dev
           ServerAlias 127.0.0.1
           DocumentRoot /path/to/yii-application/backend/web/
           
           <Directory "/path/to/yii-application/backend/web/">
               RewriteEngine on
               RewriteCond %{REQUEST_FILENAME} !-f
               RewriteCond %{REQUEST_FILENAME} !-d
               RewriteRule . index.php
           </Directory>
       </VirtualHost>
	   
	   <VirtualHost *:80>
           ServerName api.dev
           ServerAlias 127.0.0.1
           DocumentRoot /path/to/yii-application/api/web/
           
           <Directory "/path/to/yii-application/api/web/">
               RewriteEngine on
               RewriteCond %{REQUEST_FILENAME} !-f
               RewriteCond %{REQUEST_FILENAME} !-d
               RewriteRule . index.php
           </Directory>
       </VirtualHost>

   For nginx:

       server {
           charset utf-8;
           client_max_body_size 128M;
       
           listen 80; ## listen for ipv4
           #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
       
           server_name frontend.dev;
           root        /path/to/yii-application/frontend/web/;
           index       index.php;
       
           access_log  /path/to/yii-application/log/frontend-access.log;
           error_log   /path/to/yii-application/log/frontend-error.log;
       
           location / {
               # Redirect everything that isn't a real file to index.php
               try_files $uri $uri/ /index.php?$args;
           }
       
           # uncomment to avoid processing of calls to non-existing static files by Yii
           #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
           #    try_files $uri =404;
           #}
           #error_page 404 /404.html;
       
           location ~ \.php$ {
               include fastcgi_params;
               fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
               fastcgi_pass   127.0.0.1:9000;
               #fastcgi_pass unix:/var/run/php5-fpm.sock;
               try_files $uri =404;
           }
       
           location ~ /\.(ht|svn|git) {
               deny all;
           }
       }
        
       server {
           charset utf-8;
           client_max_body_size 128M;
       
           listen 80; ## listen for ipv4
           #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
       
           server_name backend.dev;
           root        /path/to/yii-application/backend/web/;
           index       index.php;
       
           access_log  /path/to/yii-application/log/backend-access.log;
           error_log   /path/to/yii-application/log/backend-error.log;
       
           location / {
               # Redirect everything that isn't a real file to index.php
               try_files $uri $uri/ /index.php?$args;
           }
       
           # uncomment to avoid processing of calls to non-existing static files by Yii
           #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
           #    try_files $uri =404;
           #}
           #error_page 404 /404.html;
       
           location ~ \.php$ {
               include fastcgi_params;
               fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
               fastcgi_pass   127.0.0.1:9000;
               #fastcgi_pass unix:/var/run/php5-fpm.sock;
               try_files $uri =404;
           }
       
           location ~ /\.(ht|svn|git) {
               deny all;
           }
       }

        server {
           charset utf-8;
           client_max_body_size 128M;
       
           listen 80; ## listen for ipv4
           #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
       
           server_name api.dev;
           root        /path/to/yii-application/api/web/;
           index       index.php;
       
           access_log  /path/to/yii-application/log/api-access.log;
           error_log   /path/to/yii-application/log/api-error.log;
       
           location / {
               # Redirect everything that isn't a real file to index.php
               try_files $uri $uri/ /index.php?$args;
           }
       
           # uncomment to avoid processing of calls to non-existing static files by Yii
           #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
           #    try_files $uri =404;
           #}
           #error_page 404 /404.html;
       
           location ~ \.php$ {
               include fastcgi_params;
               fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
               fastcgi_pass   127.0.0.1:9000;
               #fastcgi_pass unix:/var/run/php5-fpm.sock;
               try_files $uri =404;
           }
       
           location ~ /\.(ht|svn|git) {
               deny all;
           }
       }
    
    Change the hosts file to point the domain to your server.

   - Windows: `c:\Windows\System32\Drivers\etc\hosts`
   - Linux: `/etc/hosts`

   Add the following lines:

   ```
   127.0.0.1   frontend.dev
   127.0.0.1   backend.dev
   127.0.0.1   api.dev
   ```
   