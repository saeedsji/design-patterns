<?php

abstract class PaymentFactory
{
    abstract public function paymentMethod(): Gateway;

    public function pay($amount)
    {
        $paymentMethod = $this->paymentMethod();
        return $paymentMethod->call($amount);
    }
}

interface Gateway
{
    function call($amount): array;
}


class ZarinpalService implements Gateway
{
    function call($amount): array
    {
        return ['url' => 'https://Zarinpal.com', 'success' => true, 'amount' => $amount];
    }
}

class ZarinpalCreator extends PaymentFactory
{
    public function paymentMethod(): Gateway
    {
        return new ZarinpalService();
    }
}

class MelatCreator extends PaymentFactory
{
    public function paymentMethod(): Gateway
    {
        return new MelatService();
    }
}

class MelatService implements Gateway
{
    function call($amount): array
    {
        return ['url' => 'https://melatgateway.com', 'success' => true, 'amount' => $amount];
    }
}


function clientCode(PaymentFactory $paymentFactory, $amount)
{
    return $paymentFactory->pay($amount);
}

var_dump(clientCode(new ZarinpalCreator(), 12000));
var_dump(clientCode(new MelatCreator(), 30000));

