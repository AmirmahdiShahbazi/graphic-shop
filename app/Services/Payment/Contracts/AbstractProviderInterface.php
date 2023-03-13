<?php
namespace App\Services\Payment\Contracts;

abstract class AbstractProviderInterface
{
    protected $request;
    public function __contruct(RequestInterface $request)
    {
        $this->request=$request;
    }

}

