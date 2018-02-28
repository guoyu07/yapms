## `YAPMS` - Yet Another Property Management Software (PMS) for Vacation Rentals

### Getting started

In an effort to get you setup and running, I highly recommend using Vagrant and Homestead. The current version of Homestead comes packaged with PHP 7.2. The steps below cover getting things configured on a machine running Linux. Steps for setting this up on a Windows machine will get added soon. You can always reference the official [Laravel Homestead](https://laravel.com/docs/5.6/homestead) documentation for a complete overview.

### Prerequisites

#### Clone the yapms repo:

```
cd ~

mkdir git

cd ~/git

git clone git@github.com:JayForbes/yapms.git

cd yapms

composer install

cp .env.example .env

vim .env
```

The only value you will need to change in the new .env file is

```
DB_DATABASE=homestead
```

Change it to something like yapms, then write and quit:

```
:wq
```

#### Download and install Vagrant and VirtualBox:

[Vagrant](https://www.vagrantup.com/downloads.html)

[VirtualBox & VirtualBox Extension Pack](https://www.virtualbox.org/wiki/Downloads)

> As of this writing, my version of VirtualBox is 5.2.4 and Vagrant is 2.0.1, running Linux Mint 18.3
> - Jay Forbes

#### Installing the Homestead Vagrant Box:

```
vagrant box add laravel/homestead
```

#### Clone the Homestead repo:

```
git clone https://github.com/laravel/homestead.git ~/Homestead
```

#### Check out the stable branch:

```
cd ~/Homestead

git checkout v7.1.2
```

Check out the [Laravel Homestead](https://github.com/laravel/homestead/releases) release page for the latest stable version.

#### After cloning is complete, run:

```
bash init.sh
```

#### Configure the Homestead.yaml file:

```
vim Homestead.yaml
```

Here is an example of what my Homestead.yaml file contains:

```
---
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox
mariadb: true
authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: /home/myusernamedir/git/yapms
      to: /home/vagrant/dev.yapms.com

sites:
    - map: dev.yapms.com
      to: /home/vagrant/dev.yapms.com/public

databases:
    - yapms

# blackfire:
#     - id: foo
#       token: bar
#       client-id: foo
#       client-token: bar

# ports:
#     - send: 50000
#       to: 5000
#     - send: 7777
#       to: 777
#       protocol: udp
```

In the event you want a fresh Homestead.yaml file, you can always run:

```
bash init.sh
```

#### Update your /etc/hosts file:

```
sudo vim /etc/hosts
```

Add the following then write and quit:

```
192.168.10.10 dev.yapms.com
```

#### Start Vagrant

```
vagrant up
```

#### Stop Vagrant

```
vagrant halt
```

### Non Vagrant approach

**COMING SOON**

#### YAPMS was built using Laravel framework

Since this application is using Laravel 5.5. The requirements below will need to be met first.

* PHP >= 7.0.0
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

If you are using Linux Mint 18.x you can use these commands to install PHP 7.x:

```
$ sudo apt-get install php7.0 libapache2-mod-php7.0 php7.0-mbstring php7.0-mcrypt php7.0-xmlrpc phpunit
```

#### Install

At this point you've cloned the repo, be sure before running the below command that you are in the yapms.com directory.

```
$ composer install
```

Use the below command to copy the .env.example which is just a template where you will need to set some values.
```
$ cp .env.example .env
```

Once you made a copy and renamed the .evn.example file to just .env you will need to supply a few value when editing it. Don't worry this file is not tracked by git, so it's safe to store your database credentials in it, no worries! The values you will need to fill in are:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabasename
DB_USERNAME=yourusername
DB_PASSWORD=yoursupersecretpassword
```

And if you want to get S3 working, you will also need to fill in these values:

```
S3_KEY=
S3_SECRET=
S3_REGION=
S3_BUCKET=
```

Property images are stored locally for backup purposes only. Property images get purged once a month once delete and the only thing that can not be recovered once past that limit. Whomever is using the property data will and should be using the Amazon S3 links to property images (better be anyways!!!!).

You may run into some issues if you ran composer install prior to copying the .env file. No problemo! The below command is safe to run and should be, before moving onto migrations and seeding.

```
$ php artisan key:generate
```

```
$ php artisan migrate
```

```
$ php artisan db:seed
```

#### Run the application

### Framework

Made with love, made with the [Laravel](http://laravel.com) framework.

### Contact

You can communicate with me using the following method(s):

* [Follow me on Twitter](http://twitter.com/rjforbe) for announcements and updates.

### License

YAPMS is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### Contributing

Before sending a pull request, please be sure to review the [Contributing Guidelines](CONTRIBUTING.md) first, thank you.

### Coding standards

Please follow the following guides and code standards:

* [PSR 4 Coding Standards](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)
* [PSR 2 Coding Style Guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
* [PSR 1 Coding Standards](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)
