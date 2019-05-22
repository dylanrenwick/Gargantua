# Gargantua

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dylanrenwick/gargantua/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dylanrenwick/gargantua/?branch=master)
[![Code Climate](https://api.codeclimate.com/v1/badges/319025df22c1e7af05dd/maintainability)](https://codeclimate.com/github/dylanrenwick/Gargantua/maintainability)
[![Travis CI](https://travis-ci.org/dylanrenwick/Gargantua.svg?branch=master)](https://travis-ci.org/dylanrenwick/Gargantua)

Gargantua is a fork of the php-login project "HUGE".

As HUGE has reached soft end of life, this is a community continuation of the project.  
Some new things to expect in Gargantua:

 - Full PHP 7.3 support by default
    - HUGE was designed to be used with PHP 5.5 or newer. Unfortunately this limited the framework from using features new to PHP 7
 - Cleaner and explicit versioning
    - Did you know HUGE had versions? Most people didn't, it wasn't very clear
 - More features!
    - Optional Templating
    - Default actions
    - Markdown Support
    - OAuth Support

### What is HUGE?

Just a simple user authentication solution inside a super-simple framework skeleton that works out-of-the-box
(and comes with an auto-installer), using the future-proof official bcrypt password hashing/salting implementation of 
PHP 5.5+, plus some nice features that will speed up the time from idea to first usable prototype application 
dramatically. Nothing more. This project has its focus on hardcore simplicity. Everything is as simple as possible, 
made for smaller projects, typical agency work and quick drafts. If you want to build massive corporate 
applications with all the features modern frameworks have, then have a look at [Laravel](http://laravel.com), 
[Symfony](http://symfony.com) or [Yii](http://www.yiiframework.com), but if you just want to quickly create something
that just works, then this script might be interesting for you.

HUGE's simple-as-possible architecture was inspired by several conference talks, slides and articles about huge 
applications that - surprisingly and intentionally - go back to the basics of programming, using procedural programming, 
static classes, extremely simple constructs, not-totally-DRY code etc. while keeping the code extremely readable 
([StackOverflow](http://www.dev-metal.com/architecture-stackoverflow/), Wikipedia, SoundCloud).

Some interesting Buzzwords in this context: [KISS](http://en.wikipedia.org/wiki/KISS_principle), 
[YAGNI](http://en.wikipedia.org/wiki/You_aren%27t_gonna_need_it), [Feature Creep](https://en.wikipedia.org/wiki/Feature_creep),
[Minimum viable product](https://en.wikipedia.org/wiki/Minimum_viable_product).

#### Releases & development  

* Stable: **TBA**,
* Public beta: [master](https://github.com/dylanrenwick/gargantua)
* Public in-dev: [develop](https://github.com/dylanrenwick/gargantua/tree/develop) (please only submit PRs here)

#### Quick-Index 

+ [Features](#features)
+ [Live-Demo](#live-demo)
+ [Support](#support)
+ [Follow the project](#follow)
+ [License](#license)
+ [Requirements](#requirements)
+ [Auto-Installation](#auto-installation)
    - [Auto-Installation in Vagrant](#auto-installation-vagrant) (also useful for 100% reproducible installation of HUGE)
    - [Auto-Installation in Ubuntu 14.04 LTS server](#auto-installation-ubuntu)
+ [Installation (Ubuntu 14.04 LTS)](#installation)
    - [Quick Installation](#quick-installation)
    - [Detailed Installation](#detailed-installation)
    - [NGINX setup](#nginx-setup)
    - [IIS setup](#iis-setup)
+ [Documentation](#documentation)
    - [How to use the user roles](#user_roles)
    - [How to use the CSRF feature](#csrf)
+ [Community-provided features & feature discussions](#community)
+ [Future of the project, announcing soft EOL](#future)
+ [Why is there no support forum anymore ?](#why-no-support-forum)
+ [Zero tolerance for idiots, trolls and vandals](#zero-tolerance)
+ [Contribute](#contribute)
+ [Code-Quality scanner links](#code-quality)
+ [Report a bug](#bug-report)

### Features <a name="features"></a>
* Built with the official PHP password hashing functions, fitting the most modern password hashing/salting web standards
* Proper security features, like CSRF blocking (via form tokens), encryption of cookie contents etc.
* Users can register, login, logout (with username, email, password)
* Password-forget / reset
* Remember-me (login via cookie)
* Account verification via mail
* Captcha
* Failed-login-throttling
* User profiles
* Account upgrade / downgrade
* Simple user types (type 1, type 2, admin)
* Supports local avatars and remote Gravatars
* Supports native mail and SMTP sending (via PHPMailer and other tools)
* Uses PDO for database access for sure, has nice DatabaseFactory (in case your project goes big) 
* Uses URL rewriting ("beautiful URLs")
* Proper split of application and public files (requests only go into /public)
* Uses Composer to load external dependencies (PHPMailer, Captcha-Generator, etc.) for sure
* Fits PSR-0/1/2/4 coding guidelines
* Uses [Post-Redirect-Get pattern](https://en.wikipedia.org/wiki/Post/Redirect/Get) for nice application flow
* Masses of comments
* Is actively maintained and bug-fixed

### Planned features

* A real documentation (currently there's none, but the code is well commented)
* Markdown support
  
### Live-Demo <a name="live-demo"></a>

See a [live demo of older HUGE 3.0 version here](http://104.131.8.128) and [the server's phpinfo() here](104.131.8.128/info.php).

### Support the project <a name="support"></a>

Gargantua is a community-driven effort, but wouldn't exist without the work done by the developer of HUGE.  
Gargantua doesn't currently need support, so go support HUGE instead. Here's his support plug:

There is a lot of work behind this project. I might save you hundreds, maybe thousands of hours of work (calculate that
in developer costs). So when you are earning money by using HUGE, be fair and give something back to open-source.
HUGE is totally free to private and commercial use.

Support the project by renting a server at [1&1](http://www.jdoqocy.com/click-8225473-12015878-1477926464000) or
at [DigitalOcean](https://www.digitalocean.com/?refcode=40d978532a20). Thanks! :)

Also feel free to contribute to this project.

### License <a name="license"></a>

Licensed under [MIT](http://www.opensource.org/licenses/mit-license.php). 
Totally free for private or commercial projects, or any other uses.

### Requirements <a name="requirements"></a>

Make sure you know the basics of object-oriented programming and MVC, are able to use the command line and have
used Composer before. This script is not for beginners.

* **PHP 7.3+**
* **MySQL 5** database (build using MariaDB 10.3. Research your choice first)
* installed PHP extensions: pdo, gd, openssl (the install guideline shows how to do)
* installed tools on your server: git, curl, composer (the install guideline shows how to do)
* for professional mail sending: an SMTP account (I use [SMTP2GO](http://www.smtp2go.com/?s=devmetal))
* activated mod_rewrite on your server (the install guideline shows how to do)

### Auto-Installations <a name="auto-installation"></a>

Yo, fully automatic. Why ? Because I always hated it to spend days trying to find out how to install a thing.
This will save you masses of time and nerves. Donate a coffee if you like it.

#### Auto-Installation (in Vagrant) <a name="auto-installation-vagrant"></a>

If you are using Vagrant for your development, then simply 

1. Add the official Ubuntu 14.04 LTS box to your Vagrant: `vagrant box add ubuntu/trusty64`
2. Move *Vagrantfile* and *bootstrap.sh* (from *_one-click-installation* folder) to a folder where you want to initialize your project.
3. Do `vagrant up` in that folder.

5 minutes later you'll have a fully installed HUGE inside Ubuntu 14.04 LTS. The full code will be auto-synced with
the current folder. MySQL root password and the PHPMyAdmin root password are set to *12345678*. By default
192.168.33.111 is the IP of your new box.

#### Auto-Installation in a naked Ubuntu 14.04 LTS server <a name="auto-installation-ubuntu"></a>

Extremely simple installation in a fresh and naked typical Ubuntu 14.04 LTS server:

Download the installer script
```bash
wget https://raw.githubusercontent.com/panique/huge/master/_one-click-installation/bootstrap.sh
```

Make it executable
```bash
chmod +x bootstrap.sh
```

Run it! Give it some minutes to perform all the tasks. And yes, you can thank me later :)
```bash
sudo ./bootstrap.sh
```
### Installation <a name="installation"></a>

#### Quick guide: <a name="quick-installation"></a>

0. Make sure you have Apache, PHP, MySQL installed. [Tutorial](http://www.dev-metal.com/installsetup-basic-lamp-stack-linux-apache-mysql-php-ubuntu-14-04-lts/). 
1. Clone the repo to a folder on your server
2. Activate mod_rewrite, route all traffic to application's /public folder. [Tutorial](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-14-04-lts/).
3. Edit application/config: Set your database credentials
4. Execute SQL statements from application/_installation to setup database tables
5. [Install Composer](http://www.dev-metal.com/install-update-composer-windows-7-ubuntu-debian-centos/),
   run `Composer install` on application's root folder to install dependencies
6. Make avatar folder (application/public/avatars) writable
7. For proper email usage: Set SMTP credentials in config file, set EMAIL_USE_SMTP to true

"Email does not work" ? See the troubleshooting below. TODO

#### Detailed guide (Ubuntu 14.04 LTS): <a name="detailed-installation"></a>

This is just a quick guideline for easy setup of a development environment!

Make sure you have Apache, PHP 5.5+ and MySQL installed. [Tutorial here](http://www.dev-metal.com/installsetup-basic-lamp-stack-linux-apache-mysql-php-ubuntu-14-04-lts/). 
Nginx will work for sure too, but no install guidelines are available yet. 

Edit vhost to make clean URLs possible and route all traffic to /public folder of your project:
```bash
sudo nano /etc/apache2/sites-available/000-default.conf
```

and make the file look like
```
<VirtualHost *:80>
    DocumentRoot "/var/www/html/public"
    <Directory "/var/www/html/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Enable mod_rewrite and restart apache.
```bash
sudo a2enmod rewrite
service apache2 restart
```

Install curl (needed to use git), openssl (needed to clone from GitHub, as github is https only),
PHP GD, the graphic lib (we create captchas and avatars), and git.
```bash
sudo apt-get -y install curl
sudo apt-get -y install php5-curl
sudo apt-get -y install openssl
sudo apt-get -y install php5-gd
sudo apt-get -y install git
```

git clone HUGE
```bash
sudo git clone https://github.com/panique/huge "/var/www/html"
```

Install Composer
```bash
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

Go to project folder, load Composer packages (--dev is optional, you know the deal)
```bash
cd /var/www/html
composer install --dev
```

Execute the SQL statements. Via phpmyadmin or via the command line for example. 12345678 is the example password.
Note that this is written without a space.
```bash
sudo mysql -h "localhost" -u "root" "-p12345678" < "/var/www/html/application/_installation/01-create-database.sql"
sudo mysql -h "localhost" -u "root" "-p12345678" < "/var/www/html/application/_installation/02-create-table-users.sql"
sudo mysql -h "localhost" -u "root" "-p12345678" < "/var/www/html/application/_installation/03-create-table-notes.sql"
```

Make avatar folder writable (make sure it's the correct path!)
```bash
sudo chown -R www-data "/var/www/html/public/avatars"
```
If this doesn't work for you, then you might try the hard way by setting alternatively
```bash
sudo chmod 0777 -R "/var/www/html/public/avatars"
```

Remove Apache's default demo file
```bash
sudo rm "/var/www/html/index.html"
```

Edit the application's config in application/config/config.development.php and put in your database credentials.

Last part (not needed for a first test): Set your SMTP credentials in the same file and set EMAIL_USE_SMTP to true, so
you can send proper emails. It's highly recommended to use SMTP for mail sending! Native sending via PHP's mail() will
not work in nearly every case (spam blocking). I use [SMTP2GO](http://www.smtp2go.com/?s=devmetal).

Then check your server's IP / domain. Everything should work fine.

#### NGINX setup: <a name="nginx-setup"></a>

This is an untested NGINX setup. Please comment [on the ticket](https://github.com/panique/huge/issues/622) if you see 
issues.
 
```
server {
    # your listening port
    listen 80;

    # your server name
    server_name example.com;

    # your path to access log files
    access_log /srv/www/example.com/logs/access.log;
    error_log /srv/www/example.com/logs/error.log;

    # your root
    root /srv/www/example.com/public_html;

    # huge
    index index.php;

    # huge
    location / {
        try_files $uri /index.php?url=$uri&$args;
    }

    # your PHP config
    location ~ \.php$ {
        try_files $uri  = 401;
        include /etc/nginx/fastcgi_params;
        fastcgi_pass unix:/var/run/php-fastcgi/php-fastcgi.socket;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

#### IIS setup: <a name="iis-setup"></a>

Big thanks to razuro for this fine setup: Put this inside your root folder, but don't put any web.config in your public 
folder.

```
<?xml version="1.0" encoding="UTF-8"?><configuration>
    <system.webServer>
        <rewrite>
            <rules>
			
                <rule name="Imported Rule 1" stopProcessing="true">
                    <match url="^(.*)$" ignoreCase="false" />
					<conditions logicalGrouping="MatchAll">
                        <add input="{REQUEST_FILENAME}" matchType="IsDirectory" ignoreCase="false" negate="true" />
                        <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                    </conditions>
                    <action type="Rewrite" url="public/index.php?url={R:1}" />
                </rule>
            </rules>
        </rewrite>
    </system.webServer>
</configuration>
```

Find the original [ticket here](https://github.com/panique/huge/issues/788).

#### Testing with demo users

By default there are two demo users, a normal user and an admin user. For more info on that please have a look on the
user role part of the small documentation block inside this readme.
 
Normal user: Username is `demo2`, password is `12345678`. The user is already activated.
Admin user (can delete and suspend other users): Username is `demo`, password is `12345678`. The user is already activated.

### What the hell are .travis.yml, .scrutinizer.yml etc. ?

There are several files in the root folder of the project that might be irritating:

 - *.htaccess* (optionally) routes all traffic to /public/index.php! If you installed this project correctly, then this
   file is not necessary, but as lots of people have problems setting up the vhost correctly, .htaccess it still there
   to increase security, even on partly-broken-installations.
 - *.scrutinizer.yml* (can be deleted): Configs for the external code quality analyzer Scrutinizer, just used here on
   GitHub, you don't need this for your project.
 - *.travis.yml* (can be deleted): Same like above. Travis is an external service that creates installations of this
   repo after each code change to make sure everything runs fine. Also runs the unit tests. You don't need this inside
   your project.
 - *composer.json* (important): You should know what this does. ;) This file says what external dependencies are used.  
 - *travis-ci-apache* (can be deleted): Config file for Travis, see above, so Travis knows how to setup the Apache.    
    
*README* and *CHANGELOG* are self-explaining.

### Documentation <a name="documentation"></a>

A real documentation is in the making. Until then, please have a look at the code and use your IDE's code completion 
features to get an idea how things work, it's quite obvious when you look at the controller files, the model files and
how data is shown in the view files. A big sorry that there's no documentation yet, but time is rare and we are all
doing this for free in our free time :)
 
 - TODO: Full documentation
 - TODO: Basic examples on how to do things
 
#### How to use the different user roles <a name="user_roles"></a>

Currently there are two types of users: Normal users and admins. There are exactly the same, but...
 
1. Admin users can delete and suspend other users, they have an additional button "admin" in the navigation. Admin users
have a value of `7` inside the database table field `user_account_type`. They cannot upgrade or downgrade their accounts 
(as this wouldn't make sense).

2. Normal users don't have admin features for sure. But they can upgrade and downgrade their accounts (try it out via
/user/changeUserRole), which is basically a super-simple implementation of the basic-user / premium-user concept. 
Normal users have a value of `1` or `2` inside the database table field `user_account_type`. By default all new 
registered users are normal users with user role 1 for sure.

See the "Testing with demo users" section of this readme for more info.

There's also a very interesting [pull request adding user roles and user permissions](https://github.com/panique/huge/pull/691),
which is not integrated into the project as it's too advanced and complex. But, this might be exactly what you need,
feel free to try.

#### How to use the CSRF feature <a name="csrf"></a>
 
To prevent [CSRF attacks](https://en.wikipedia.org/wiki/Cross-site_request_forgery), HUGE does this in the most common 
way, by using a security *token* when the user submits critical forms. This means: When PHP renders a form for the user, 
the application puts a "random string" inside the form (as a hidden input field), generated via Csrf::makeToken() 
(application/core/Csrf.php), which also saves this token to the session. When the form is submitted, the application 
checks if the POST request contains exactly the form token that is inside the session.
  
This CSRF prevention feature is currently implemented on the login form process (see *application/view/login/index.php*)
and user name change form process (see *application/view/user/editUsername.php*), most other forms are not security-
critical and should stay as simple as possible.

So, to do this with a normal form, simply: At your form, before the submit button put:
`<input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />`
Then, in the controller action validate the CSRF token submitted with the form by doing:
```
// check if csrf token is valid
if (!Csrf::isTokenValid()) {
    LoginModel::logout();
    Redirect::home();
    exit();
}
```

A big thanks to OmarElGabry for implementing this!

#### Can a user be logged in from multiple devices ?

In theory: Yes, but this feature didn't work in my tests. As it's an external feature please have a look into the 
[according ticket](https://github.com/panique/huge/pull/693) for more.

#### Troubleshooting & Glitches

* In 3.0 and 3.1 a user could log into the application from different devices / browsers / locations. This was intended
  behaviour as this is standard in most web applications these days. In 3.2 still feature is "missing" by default, a 
  user will only be able to log in from one browser at the same time. This is a security improvement, but for sure not 
  optimal for many developers. The plan is to implement a config switch that will allow / disallow logins from multiple 
  browsers.
* Using this on a sub-domain ? You might get problems with the cookies in IE11. Fix this by replacing "/" with "./" of 
  the cookie location COOKIE_PATH inside application/config/config.xxx.php! 
  Check [ticket #733](https://github.com/panique/huge/issues/733) for more info. Thanks to jahbiuabft for figuring this
  out. Update: There's another ticket focusing on the same issue: [ticket #681](https://github.com/panique/huge/issues/681)
 
### Community-provided features & feature discussions <a name="community"></a>

There are some awesome features or feature ideas build by awesome people, but these features are too special-interest
to go into the main version of HUGE, but have a look into these tickets if you are interested:

 - [Caching system](https://github.com/panique/huge/issues/643)
 - [ReCaptcha as captcha](https://github.com/panique/huge/issues/665)
 - [Internationalization feature](https://github.com/panique/huge/issues/582)
 - [Using controller A inside controller B](https://github.com/panique/huge/issues/706)
 - [HTML mails](https://github.com/panique/huge/issues/738)
 - [Deep user roles / user permission system](https://github.com/panique/huge/pull/691)
 
### Coding guideline behind Gargantua

While HUGE was in development, there were 3 main rules that helped to write minimal, clean and working code.  
Might be useful for you too:

1. Reduce features to the bare minimum.
2. Don't implement features that are not needed by most users.
3. Only build everything for the most common use case (like MySQL, not PostGre, NoSQL etc).

There are also some powerful concepts that might help you when developing cool stuff:  
[KISS](http://en.wikipedia.org/wiki/KISS_principle), [YAGNI](http://en.wikipedia.org/wiki/You_aren%27t_gonna_need_it), [Feature Creep](https://en.wikipedia.org/wiki/Feature_creep), [Minimum viable product](https://en.wikipedia.org/wiki/Minimum_viable_product).
 
#### List of features / ideas provided in tickets / pull requests

To avoid unnecessary work for all of us I would kindly recommend everybody to use HUGE for simple project that only
need the features that already exist, and if you really need a RESTful architecture, migrations, routing, 2FA etc,
then it's easier, cleaner and faster to simply use Laravel, Symfony or Zend.

However, here are the community-suggested possible features, taken from lots of tickets. Feel free to implement them
into your forks of the project: 

* OAuth2 implementation (let your users create accounts and login via 3rd party auth, like Facebook, Twitter, GitHub, 
  etc). As this is a lot of work and would make the project much more complicated it might make sense to do this in a 
  fork or totally skip it. (see [Ticket #528](https://github.com/panique/huge/issues/528))
* Router (map all URLs to according controller-methods inside one file), [Ticket 727](https://github.com/panique/huge/issues/727)
* RESTful architecture (see [ticket #488](https://github.com/panique/huge/issues/488) for discussion)
* Horizontal MySQL scaling (see [ticket #423](https://github.com/panique/huge/issues/423) for discussion)
* Modules / middleware
* Logging
* Two-Factor-Authentication (see [ticket #732](https://github.com/panique/huge/issues/732))
* Controller-less URLs (see [ticket #704](https://github.com/panique/huge/issues/704))
* Email-re-validation after email change (see [ticket #705](https://github.com/panique/huge/issues/705))
* Connect to multiple databases (see [ticket #702](https://github.com/panique/huge/issues/702))
* A deeper user role system (see [ticket #701](https://github.com/panique/huge/issues/701), 
[pull-request #691](https://github.com/panique/huge/pull/691)), 
[ticket #603](https://github.com/panique/huge/issues/603)
* How to run without using Composer [ticket #826](https://github.com/panique/huge/issues/826)

### Zero tolerance for idiots, trolls and vandals! <a name="zero-tolerance"></a>

This was a policy put in place by the creator of the original HUGE framework. However it's an open-source ideology that I don't agree with.

This is a product that I am putting out for free. Nontheless it is still a product.  
Don't expect enterprise level support, but this project is still tied to my name, and my reputation. I want this project to be the best it can be, and I want it to work for its users. As such, I am happy to offer a level of support a little above the "I'm not obligated to give you anything" mentality of other FOSS developers.

That said, trolls, vandals, and entitlement are not tolerated.

### Contribute <a name="contribute"></a>

Please submit PRs only in *develop* branch. The *master* branch will always contain the stable version. Merges into master will be made at my discretion, or if a recognized contributor believes it's a good point for a release, and submits a merge PR.

### Code-Quality scanner links <a name="code-quality"></a>

[Scrutinizer (master branch)](https://scrutinizer-ci.com/g/panique/huge/?branch=master),
[Scrutinizer (develop branch)](https://scrutinizer-ci.com/g/panique/huge/?branch=develop),
[Code Climate](https://codeclimate.com/github/panique/huge),
[Codacy](https://www.codacy.com/public/panique/phplogin/dashboard?bid=789836), 
[SensioLabs Insight](https://insight.sensiolabs.com/projects/d4f4e3c0-1445-4245-8cb2-d75026c11fa7/analyses/2).

### Found a bug (Responsible Disclosure) ? <a name="bug-report"></a>

It is often (rightly so) considered dangerous to report major bugs and vulnerabilities publicly due to the possible consequences when publishing a bug.  
However requiring that such bugs be mailed to me creates an assumption and expectation that I and I alone will *always* be available to address these emails.  
As such, for the time being, please report all bugs, large or small, using GitHub issues.  
If this becomes a problem in the future, we will set up a system such that bug reports can be made and sent to the entire team without the public having visibility.

### Current and further development

See active issues here:
https://github.com/dylanrenwick/gargantua/issues?state=open

### Why you should use a favicon.ico in your project :)

Interesting issue: When a user hits your website, the user's browser will also request one or more (!) favicons 
(different sizes). If these static files don't exist, your application will start to generate a 404 response and a 404 
page for each file. This wastes a lot of server power and is also useless, therefore make sure you always have favicons
or handle this from Apache/nginx level.

Gargantua tries to handle this by sending an empty image in the head of the view/_templates/header.php !

More inside this ticket: [Return proper 404 for missing favicon.ico, missing images etc.](https://github.com/panique/huge/issues/530)

More here on Stackflow: [How to prevent favicon.ico requests?](http://stackoverflow.com/questions/1321878/how-to-prevent-favicon-ico-requests),
[Isn't it silly that a tiny favicon requires yet another HTTP request? How to make favicon go into a sprite?](http://stackoverflow.com/questions/5199902/isnt-it-silly-that-a-tiny-favicon-requires-yet-another-http-request-how-to-mak?lq=1).

### Useful links

- [How long will my session last?](http://stackoverflow.com/questions/1516266/how-long-will-my-session-last/1516338#1516338)
- [How to do expire a PHP session after X minutes?](http://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes/1270960#1270960)
- [How to use PDO](http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers)
- [A short guideline on how to use the PHP 5.5 password hashing functions and its PHP 5.3 & 5.4 implementations](http://www.dev-metal.com/use-php-5-5-password-hashing-functions/)
- [How to setup latest version of PHP 5.5 on Ubuntu 12.04 LTS](http://www.dev-metal.com/how-to-setup-latest-version-of-php-5-5-on-ubuntu-12-04-lts/)
- [How to setup latest version of PHP 5.5 on Debian Wheezy 7.0/7.1 (and how to fix the GPG key error)](http://www.dev-metal.com/setup-latest-version-php-5-5-debian-wheezy-7-07-1-fix-gpg-key-error/)
- [Notes on password & hashing salting in upcoming PHP versions (PHP 5.5.x & 5.6 etc.)](https://github.com/panique/huge/wiki/Notes-on-password-&-hashing-salting-in-upcoming-PHP-versions-%28PHP-5.5.x-&-5.6-etc.%29)
- [Some basic "benchmarks" of all PHP hash/salt algorithms](https://github.com/panique/huge/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
- [How to prevent PHP sessions being shared between different apache vhosts / different applications](http://www.dev-metal.com/prevent-php-sessions-shared-different-apache-vhosts-different-applications/)

## Interesting links regarding user authentication and application security

- [interesting article about password resets (by Troy Hunt, security expert)](http://www.troyhunt.com/2012/05/everything-you-ever-wanted-to-know.html)
- Password-Free Email Logins: [Ticket & discussion](https://github.com/panique/huge/issues/674), [article](http://techcrunch.com/2015/06/30/blogging-site-medium-rolls-out-password-free-email-logins/?ref=webdesignernews.com)
- Logging in via QR code: [Ticket & discussion](https://github.com/panique/huge/issues/290), [english article](https://www.grc.com/sqrl/sqrl.htm), 
  [german article](http://www.phpgangsta.de/sesam-oeffne-dich-sicher-einloggen-im-internetcafe), 
  [repo](https://github.com/PHPGangsta/Sesame), [live-demo](http://sesame.phpgangsta.de/). Big thanks to *PHPGangsta* for writing this!
  
### My blog

I'm also blogging at **[Dev Metal](http://www.dev-metal.com)**.
