# Easy flash messages

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