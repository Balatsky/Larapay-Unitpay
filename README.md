# Unitpay
This package is Larapay extension for Unitpay payment gateway.

## Installation
``` bash
$ composer install balatsky/larapay-unitpay
```

Extend Larapay in any part of your app:
``` php
/*
 * Using Service Provider (in your app/config.php)
 */
'providers' => [
    // other providers
    
    \Skylex\Larapay\Gateways\UnitpayServiceProvider::class,
],

/*
 * Or manually in any part of your app.
 * $larapay must be instance of \Skylex\Larapay\GatewayManager.
 */
$larapay->extend('unitpay', \Skylex\Larapay\Gateways\Unitpay::class);
```

Add configuration in `config/larapay.php`:
``` php
'gateways' => [
    // other gateways
    
    \Skylex\Larapay\Gateways\Unitpay::class => [
         'algo'   => '',
         'public' => '',
         'secret' => '',
    ],
],    

```

## Usage
See usage example in [Larapay repository](https://github.com/balatsky/larapay).