



### Configure DB Connection

```yaml
# app/config/config.yml
doctrine:
    dbal:
        driver:   pdo_mysql
        host:     '%database_host%'
        dbname:   '%database_name%'
        user:     '%database_user%'
        password: '%database_password%'
```


### Create DB

```bash
php app/console doctrine:database:create
```


### Set UTF-8

```bash
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
```


php app/console doctrine:generate:entity
