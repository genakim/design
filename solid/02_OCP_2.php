<?php

/**
 * Another example OCP
 */

interface PaymentMethodInterface
{
    public function acceptPayment($receipt);
}

class CashPaymentMethod implements PaymentMethodInterface {

    public function acceptPayment($receipt)
    {
        // TODO: Implement acceptPayment() method.
    }
}

class PaypalPaymentMethod implements PaymentMethodInterface {

    public function acceptPayment($receipt)
    {
        // TODO: Implement acceptPayment() method.
    }
}

class BitcoinPaymentMethod implements PaymentMethodInterface {

    public function acceptPayment($receipt)
    {
        // TODO: Implement acceptPayment() method.
    }
}

class Checkout
{
    public function begin(Recept $receipt, PaymentMethodInterface $payment)
    {
        $payment->acceptPayment($receipt);
    }
}