SI-Obědy
========

- aplikace: https://www.obedy.mgw.cz (user alice, heslo alice)
- administrace: https://www.obedy.mgw.cz (user admin, bez hesla)
- wiki: https://trac.project.fit.cvut.cz/Obedy
- svn s EA modelem: https://svn.project.fit.cvut.cz/Obedy
- git s implementací: https://gitlab.fit.cvut.cz/bi-si1-obedy/obedy

Aplikace je psaná částečně v češtině a to proto, aby odpovídala Enterprise Architect modelu.

Instalační příručka
===================

Závislosti aplikace
-------------------

- PHP ~7.0.0
- rozšíření
	- `php-json` pro načítání konfigurace a serializace dat
	- `php-mbstring` bezpečné operace nad textovými řetězci
	- `php-mcrypt` šifrování
	- `php-pgsql` komunikace s databází
- PostgreSQL 9.4
- [composer](https://getcomposer.org/) na instalaci knihoven (viz `/composer.json`)
	- `nette ~2.3` hlavní aplikační framework
	- `nextras/migrations` verzované změny v databázovém schématu
	- `nextras/orm` knihovna pro práci s entitami
	- `nextras/dbal` abstrakce nad `php-pgsql`, komunikace s databází
	- `kdyby/console` konzolové nástroje na spouštění migrací atp.
	- `symfony/console` závislost `kdyby/console`

Setup
-----

#### Instalace PHP

##### RHEL/CentOS

Doporučujeme PHP instalovat z [Remiho rpm repozitáře](http://rpms.famillecollet.com/). Postup na instalaci je naprosto detailně zde: http://rpms.remirepo.net/wizard/.

Pro CentOS7:
```sh
# Command to install the EPEL repository configuration package:
yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm

# Command to install the Remi repository configuration package:
yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm

# Command to install the yum-utils package (for the yum-config-manager command):
yum install yum-utils

# Command to enable the repository:
yum-config-manager --enable remi-php70

# Command to upgrade (the repository only provides PHP):
yum update
```

a následně

```sh
yum install php php-mcrypt php-pgsql php-mbstring php-json
```

##### Debian

Doporučujeme [Dotdeb](https://www.dotdeb.org/category/php/) repozitář. [Postup pro instalaci](https://www.dotdeb.org/instructions/) PHP z tohoto zdroje je následovný:

Debian (jessie):
```sh
echo 'deb http://packages.dotdeb.org jessie all' > /etc/apt/sources.list/dotdeb.list
echo 'deb-src http://packages.dotdeb.org jessie all' >> /etc/apt/sources.list/dotdeb.list
wget https://www.dotdeb.org/dotdeb.gpg
apt-key add dotdeb.gpg
apt-get update
apt-get install php70 php70-mcrypt php70-pgsql php70-mbstring php70-json
```

#### Instalace PostgreSQL

##### RHEL/CentOS

```sh
yum install http://yum.postgresql.org/9.4/redhat/rhel-6-x86_64/pgdg-centos94-9.4-1.noarch.rpm
yum update
yum install postgresql94-server
```

##### Debian

```sh
deb http://apt.postgresql.org/pub/repos/apt/ wheezy-pgdg main
sudo sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt/ $(lsb_release -cs)-pgdg main" > /etc/apt/sources.list.d/pgdg.list'
sudo apt-get install wget ca-certificates
wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install postgresql-9.4
```

#### Instalace nástroje composer

Postup instalace je detailně popsán zde: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx

#### Instalace PHP knihoven

V rootu projektu spusťe tento příkaz

```console
$ composer install
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
...
Generating autoload files
```

#### Vytvoření databáze

Pomocí cli nástroje přiloženého k postgresql distribuci vytvořte novou databázi v nově nainstalovaném postgresql serveru:

```console
createdb obedy
```

#### Konfigurace

Vytvořte konfigurační soubor aplikace zkopírováním `app/config/local.sample.neon` do `app/config/local.neon` a aktualizujte parametry připojení k databázi.

Spuštění aplikace
-----------------

PHP aplikace nepotřebují žádný spouštěč a očekává se, že budou provozovány pod dedikovaným web serverem. Pro nginx doporučujeme použít php-fpm, pro Apache php-cgi. Konfigurace webserveru je nad rámec tohoto manuálu.

Pro spuštění serveru na lokálním stroji pouze pro vývoj lze využít web server zabudovaný v php:

```
php -S localhost:8000 -t www
```

Aplikace je potom dostupná na adrese http://localhost:8000.


Licence
-------
- Nette: New BSD License or GPL 2.0 or 3.0
- Adminer: Apache License 2.0 or GPL 2
