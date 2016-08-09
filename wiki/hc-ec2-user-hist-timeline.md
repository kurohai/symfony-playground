
## Reconstruction of Events from History File

1. Installs updates with `yum`
1. Installs Apache, PHP 5.6, MySQL 5.5, and PHP 5.6 MySQL ND (Probably MySQL driver for PHP)
1. Start httpd service
1. Config Apache to start on reboot
1. Looks around the `./Workspace/TestApp/` dir
1. Moves the `composer.phar` file to `../` (`/home/ec2-user/Workspace` dir)
1. Removes the `TestApp/` dir
1. Create new symfony project using `composer.phar`    
`php composer.phar create-project symfony/framework-standard-edition TestApp`
1. Possible changes made to `/etc/php.ini`
