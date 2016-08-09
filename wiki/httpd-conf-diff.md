
### Lines Changed in `httpd.conf` ###

```xml
<Directory />
    AllowOverride none
    Require all denied
</Directory>
DocumentRoot "/var/www/html/web/"
<Directory "/var/www/html/">
    AllowOverride None
    Require all granted
</Directory>
<Directory "/var/www/html/web">
    Options Indexes FollowSymLinks
    AllowOverride None
    Require all granted
</Directory>
<IfModule dir_module>
    DirectoryIndex app.php
</IfModule>
```


### Local Copy ###

```bash
/d/dropbox/git/hc-test/dev-httpd.conf
```
