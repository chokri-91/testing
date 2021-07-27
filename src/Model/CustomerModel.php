<?php

namespace App\Model;


use App\Infrastructure\Database;

class CustomerModel
{
    public function findByCountry($country)
    {
        $database = new Database();

        $sql = 'SELECT
                    customerName,
                    contactLastName,
                    contactFirstName,
                    addressLine1,
                    addressLine2,
                    city
                FROM customers
                WHERE country LIKE ?';

        return $database->query($sql, [$country]);
    }
}
