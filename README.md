# Easy flash messages

![alt text](https://github.com/lukashron/easy-messages/blob/master/screenshot.png?raw=true)

Simple flash messages for PHP.

Install
-------
```
    $ composer require lukashron/easy-messages
```

Use
---
```php
    $flashMessage = new \LukasHron\EasyMessages\Messages();
    $flashMessage->add('My flash messages', 'error');
    $flashMessage->render();
```

Test
----
```
    $ docker compose exec app php ./vendor/bin/phpunit
```

www.lukashron.cz