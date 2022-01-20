# Easy flash messages

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