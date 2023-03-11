<?php

use App\Services\Payment\Contracts\AbstractProviderInterface;
use App\Services\Payment\Providers;
use App\Services\Payment\Contracts\PaiableInterface;
use App\Services\Payment\Contracts\VerifiableInterface;

class IDPayProvider extends AbstractProviderInterface implements PaiableInterface, VerifiableInterface 
{
    public function pay()
    {
        
    }
    public function verify()
    {
    }
}
