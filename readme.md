# High Cotton Code Assessment #


## Overview ##

> You'll be creating a sample Inventory application to demonstrate your ability to learn Symfony and Doctrine's peculiarities.

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


### 
