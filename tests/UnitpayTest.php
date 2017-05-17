<?php

use PHPUnit\Framework\TestCase;

class UnitpayTest extends TestCase
{

    public function testSign()
    {
        $this->assertEquals('1c13b0fad5b6aa52128a57a74770802a4a2f124e40cfe1a2192d654369594077',
            $this->getGateway()->sign($this->data('params')));
    }

    public function testHandle()
    {
        $request = new \Illuminate\Http\Request($this->data('request'));

        $this->assertTrue($this->getGateway()->handle($request));
    }

    public function data($type)
    {
        return json_decode(file_get_contents(__DIR__ . '/data.json'), true)[$type];
    }

    protected function getGateway()
    {
        return new \Skylex\Larapay\Gateways\Unitpay($this->data('config'));
    }
}
