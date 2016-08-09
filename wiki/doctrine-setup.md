
### Setup DB ###

```bash
systemctl start mariadb.service
systemctl enable mariadb.service
mysql_secure_installation
# enter configuration at prompts...
```

### Configure DB Connection ###

```yaml
# app/config/config.yml
doctrine:
    dbal:
        driver:   pdo_mysql
        host:     '%database_host%'
        dbname:   '%database_name%'
        user:     '%database_user%'
        password: '%database_password%'

# app/config/parameters.yml
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: symfony
    database_user: root
    database_password: password
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: null
    mailer_password: null
    secret: ThisDoesntReallyNeedToBeSecret
```


### Set UTF-8

```yaml
# app/config/config.yml
doctrine:
    dbal:
        driver:   pdo_mysql
        host:     "%database_host%"
        port:     "%database_port%"
        dbname:   "%database_name%"
        user:     "%database_user%"
        password: "%database_password%"
        charset:  utf8mb4
        default_table_options:
            charset: utf8mb4
            collate: utf8mb4_unicode_ci
```


### Create DB ###

```bash
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
```


### Create Entities in `src/AppBundle/Entity`

```php
<?php
// src/AppBundle/Entity/Product.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
}

```


## Auto Getter/ Setter Generator

```bash
php app/console doctrine:generate:entities AppBundle/Entity/Product

```


### Create DB Schema ###

```bash
php app/console doctrine:schema:update --force
```

