<?php

namespace App\Services\Payment\Requests;
use App\Services\Payment\Contracts\RequestInterface;

class IDPayRequest implements RequestInterface
{
    private $user;
    private $amount;
    private $orderId;
    public function __construct(array $data)
    {
        $data['user']=$this->user;
        $data['amount']=$this->amount;
        $data['orderId']=$this->orderId;

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
    
}