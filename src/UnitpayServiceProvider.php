<?php

namespace Skylex\Larapay\Gateways;

use Illuminate\Foundation\Application;
use Skylex\Larapay\Contracts\Payments;
use Illuminate\Support\ServiceProvider;

class UnitpayServiceProvider extends ServiceProvider
{
    /**
     * @var Payments
     */
    protected $larapay;

    /**
     * UnitpayServiceProvider constructor.
     *
     * @param Application $app
     * @param Payments    $larapay
     */
    public function __construct(Application $app, Payments $larapay)
    {
        parent::__construct($app);

        $this->larapay = $larapay;
    }

    /**
     * Bind implementation to unitpay slug.
     */
    public function register()
    {
        $this->larapay->extend('unitpay', Unitpay::class);
    }
}