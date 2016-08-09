# High Cotton Code Assessment #


## Instructions

### You'll be creating a sample Inventory application to demonstrate your ability to learn Symfony and Doctrine's peculiarities.

1. Using the provided HCTest key, git clone the TestApp repo and SSH into this server as ec2-user.
1. Create a new index page with a menu link titled "Parts".
    1. Reuse bootstrap themes and nav menu
1. Create a Category entity which will hold Parts.
    1. Doctrine calls database models entities
    1. Just a class that extends Doctrine version of BaseModel
1. Create a Part entity that is linked with a Category (other fields are up to you).
    1. Category and Parts will subclass or extend BaseEntity
1. Create admin pages to create and edit Categories with links in the menu.
1. Create admin pages to create and edit Parts with links in the menu.
1. Add a display of Parts to the index page with the ability to filter by Category.
1. Make sure the website displays correctly in production mode and let us know you've finished.

## Overview ##

1. Create BaseEntity Doctrine model.
1. Create Parts and Category models extending BaseEntity.
1. Add one to one relation from Parts to Category.
1. Create admin pages for Parts and Category
    1. Update admin pages dynamically.
    1. Any db model data validation should be a method on the model, not in admin pages.
    1. 

1. Create one View page for Parts containing list of parts in db, columns filterable, and sortable
1. 1. Nav menu should have links to Home, PartsView, PartsAdmin, and CategoryAdmin






I had a hunch that Symfony was a PHP web framework, which I confirmed. No idea what Doctrine was. Google says it's a PHP ORM. That's all I need to know to get started.


## Steps ##

The first thing I did when I received Jon's email was SSH to the IP. When I got in, I looked around at the environment, OS, local files and dirs. Found the TestApp.git directory. I hadn't seen a local git server setup, so it was a bit confusing at first.


### 1. Clone TestApp Repo ###

> Using the provided HCTest key, git clone the TestApp repo and SSH into this server as ec2-user.

This is an easy, common, everyday task for any developer. Then the problems began. I've cloned many a git repo using HTTP/S, but never using SSH, and not with a RSA key. After some googling, and trial-and-error, I finally got the following commands to work in git bash.

```bash
eval `ssh-agent -s`
ssh-add ./.ssh/HCTest.pem
git clone ec2-user@52.87.236.27:/home/ec2-user/TestApp.git
```

My lazy SSH alias:

`alias hcbox='eval `ssh-agent -s`; ssh-add $G/hc-test/.ssh/HCTest.pem; hc="52.87.236.27"; ssh ec2-user@$hc'`

Now, on to the good stuff.


### Got Symfony Up and Running ###

composer

```bash
php composer.phar create-project symfony/framework-standard-edition MyFirstApp
```
stuff...

### Got My libs Installed ###

Followed the project structure here: `http://symfony.com/doc/current/page_creation.html#checking-out-the-project-structure`
