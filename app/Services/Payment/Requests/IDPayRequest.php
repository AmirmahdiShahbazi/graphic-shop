<?php

namespace App\Services\Payment\Requests;
use App\Services\Payment\Contracts\RequestInterface;

class IDPayRequest implements RequestInterface
{
    private $user;
    private $amount;
    private $orderId;
    private $apiKey;
    public function __construct(array $data)
    {
        $this->user=$data['user'];
        $this->amount=$data['amount'];
        $this->apiKey=$data['apiKey'];
        $this->orderId=$data['orderId'];

    }
    public function getOrderId()
    {
        return $this->orderId;
    }
    public function getUser()
    {
    return $this->user;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function getApiKey()
    {
        return $this->apiKey;
    }
    
}