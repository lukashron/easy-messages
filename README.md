# Easy flash messages

![alt text](https://github.com/lukashron/easy-messages/blob/master/screenshot.png?raw=true)

Simple PHP flash messages for small appplications.

## Install
```
composer require lukashron/easy-messages
```

## Use

```php
$flashMessage = new \LukasHron\EasyMessages\Messages();
$flashMessage->add('My flash messages', 'error');
$flashMessage->render();
```

www.lukashron.cz