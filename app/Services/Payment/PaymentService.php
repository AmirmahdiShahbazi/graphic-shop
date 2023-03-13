<?php

namespace App\Services\Payment;
use App\Services\Payment\Contracts\RequestInterface;
use App\Services\Payment\Exceptions\ProviderNotExistException;
use App\Services\Payment\Requests\IDPayRequest;
class PaymentService
{
    public const IDPAY='IDPayProvider';
    private string $providerName;
    private RequestInterface $request;
    public function __construct(string $providerName, RequestInterface $request)
    {
        $this->providerName=$providerName;
        $this->request=$request;

    }
    public function pay()
    {
        return $this->findProvider()->pay();

    }
    private function findProvider()
    {
        $className='App\Services\Payment\Providers\\'.$this->providerName;
        if(!class_exists($className))
        {
            throw new ProviderNotExistException('درگاه پرداخت انتخاب شده پیدا نشد');
            
        }
        return new $className($this->request);

    }
}
