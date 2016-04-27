Obedy
=====

- wiki: https://trac.project.fit.cvut.cz/Obedy
- svn s EA modelem: https://svn.project.fit.cvut.cz/Obedy
- git s implementací: https://gitlab.fit.cvut.cz/bi-si1-obedy/obedy

Aplikace je psaná částečně v češtině a to proto, aby odpovídala Enterprise Architect modelu.

Application Setup
-----------------

Stack dependencies:
- [composer](https://getcomposer.org/)
- PHP 7.0

Library dependencies:

install with
```
composer install
```

Nette Sandbox
=============

Web Server Setup
----------------

The simplest way to get started is to start the built-in PHP server in the root directory of your project:

		php -S localhost:8000 -t www

Then visit `http://localhost:8000` in your browser to see the welcome page.

For Apache or Nginx, setup a virtual host to point to the `www/` directory of the project and you
should be ready to go.

It is CRITICAL that whole `app/`, `log/` and `temp/` directories are not accessible directly
via a web browser. See [security warning](https://nette.org/security-warning).


Requirements
------------

PHP 5.3.1 or higher. To check whether server configuration meets the minimum requirements for
Nette Framework browse to the directory `/checker` in your project root (i.e. `http://localhost:8000/checker`).


Adminer
-------

[Adminer](https://www.adminer.org/) is full-featured database management tool written in PHP and it is part of this Sandbox.
To use it, browse to the subdirectory `/adminer` in your project root (i.e. `http://localhost:8000/adminer`).


License
-------
- Nette: New BSD License or GPL 2.0 or 3.0
- Adminer: Apache License 2.0 or GPL 2
