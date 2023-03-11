<?php
namespace App\Services\Payment\Contracts;


interface PaiableInterface
{
    public function pay();
}