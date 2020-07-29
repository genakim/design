<?php

/**
 * Данный паттерн используется для получения объектов по условиям спецификации
 *
 * Specification class
 * Class CustomerIsGold
 */
class CustomerIsGold {
    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->type() == 'gold';
    }
    public function asScope($query)
    {
        return $query->where('type', 'gold');
    }
}

class CustomersRepository {

    public function whoMatch($specification)
    {
        $customers = Customer::query();

        $customers = $specification->asScope($customers);

        return $customers->get();
    }
}

$results = (new CustomersRepository())->whoMatch(new CustomerIsGold());