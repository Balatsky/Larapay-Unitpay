# Unitpay
This package is Larapay extension for Unitpay payment gateway.

## Installation
``` bash
$ composer install balatsky/larapay-unitpay
```

Add configuration in `config/larapay.php`:
``` php
'gateways' => [
    // other gateways
    
    \Skylex\Larapay\Gateways\Unitpay::class => [
         'algo'   => '', // hashing algorhitm, md5 or sha256
         'public' => '', // public merchant id
         'secret' => '', // secret merchant key
    ],
],    

```

## Usage
See usage example in [Larapay repository](https://github.com/balatsky/larapay).