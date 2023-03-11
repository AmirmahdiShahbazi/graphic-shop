<?php

namespace App\Services\Payment\Requests;
use App\Services\Payment\Contracts\RequestInterface;

class IDPayRequest implements RequestInterface
{
    private $user;
    private $amount;
    public function __construct(array $data)
    {
        $data['user']=$this->user;
        $data['amount']=$this->amount;

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