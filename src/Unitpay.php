<?php

namespace Skylex\Larapay\Gateways;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Skylex\Larapay\Abstracts\Gateway;
use Skylex\Larapay\Contracts\Gateway as Contract;

class Unitpay extends Gateway implements Contract
{
    /**
     * The list of aliases for payment gateway.
     *
     * @var array
     */
    public $aliases = [
        'id'          => 'account',
        'amount'      => 'sum',
        'description' => 'desc',
    ];

    /**
     * The list of required request parameters.
     *
     * @var array
     */
    protected $required = [
        'id',
        'amount',
        'signature',
        'description',
    ];

    /**
     * Get redirect url to payment gateway.
     *
     * @return string
     */
    public function getInteractionUrl(): string
    {
        return 'https://unitpay.ru/pay/' . $this->config->get('public');
    }

    /**
     * Sign outcome request (insert request signature in request parameters)
     *
     * @param array $data
     *
     * @return string
     */
    public function sign(array $data): string
    {
        $data = Arr::except($data, ['sign', 'signature']);

        ksort($data);

        $data[] = $this->config->get('secret');

        return hash($this->config->get('algo', 'md5'), join('{up}', $data));
    }

    /**
     * Determine if request was sent originally from payment gateway.
     *
     * @param Request $request
     *
     * @return bool
     */
    public function handle(Request $request): bool
    {
        list($method, $params) = array_values($request->all());

        $data      = Arr::except($params, ['sign', 'signature']);

        array_push   ($data, $this->config->get('secret'));
        array_unshift($data, $method);

        $signature = hash($this->config->get('algo', 'md5'), join('{up}', $data));

        return $params['signature'] == $signature;
    }
}
