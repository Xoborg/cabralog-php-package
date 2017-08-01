# Php package for cabralog
Official php package for http://www.cabralog.es service.

# Requirements
* PHP >= 5.6
* Guzzle http client

# Installation
```
composer require xoborg/cabralog-php-package
```

# Usage
First you need to login into the cabralog app with your credentials, and get your TokenUser and the TokenProject from the project you want to use.

And that's it, now you can start sending logs to cabralog.

```php
use Xoborg\Cabralog\Cabralog;

...

Cabralog::setTokenUser('{TokenUser}');
Cabralog::setTokenProject('{TokenProject}');
$response = Cabralog::setLog('{Name}', '{LogContent}');
$response = Cabralog::setText('{Name}', '{LogContent}');
$response = Cabralog::setTimeStats('{Name}', '{LogContent}');
```

If you want to send logs to multiple projects, you can specify the TokenProject on each method call:

```php
use Xoborg\Cabralog\Cabralog;

...

Cabralog::setTokenUser('{TokenUser}');
$response = Cabralog::setLog('{Name}', '{LogContent}', '{TokenProject}');
$response = Cabralog::setText('{Name}', '{LogContent}', '{TokenProject2}');
$response = Cabralog::setTimeStats('{Name}', '{LogContent}', '{TokenProject3}');
```
