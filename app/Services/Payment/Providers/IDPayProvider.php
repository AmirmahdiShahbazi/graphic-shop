<?php
namespace App\Services\Payment\Providers;
use App\Services\Payment\Contracts\AbstractProviderInterface;
use App\Services\Payment\Contracts\PaiableInterface;
use App\Services\Payment\Contracts\VerifiableInterface;

class IDPayProvider extends AbstractProviderInterface implements PaiableInterface, VerifiableInterface 
{
    public function pay()
    {
        $params = array(
            'order_id' =>$this->request->getOrderId() ,
            'amount' => $this->request->getAmount(),
            'name' => $this->request->getUser()->name,
            'phone' => $this->request->getUser()->mobile,
            'mail' => $this->request->getUser()->email,
            'callback' => route('payment.callback'),
          );
          
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: '.$this->request->getApiKey(),
            'X-SANDBOX: 1'
          ));
          
          $result = json_decode(curl_exec($ch),true);
          curl_close($ch);
          if(isset($result['error_code']))
          {
            throw new \InvalidArgumentException($result['error_message']);
          }
         
          return redirect()->away($result['link']);
          
    }
    public function verify()
    {
    }
}
