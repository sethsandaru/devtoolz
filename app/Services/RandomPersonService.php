<?php

namespace App\Services;
use Faker\Provider\en_US\Address;

class RandomPersonService
{
    /**
     * Random data for a fake person in US
     *
     * @TODO: we will implement the other countries soon
     */
    public function random(): array
    {
        $firstName = fake()->firstName();
        $lastName = fake()->lastName();
        $fullName = "$firstName $lastName";
        $address = fake()->streetAddress();
        $city = fake()->city();
        $zipCode = Address::postcode();
        $state = Address::stateAbbr();
        $country = 'US';

        $creditCard = fake()->creditCardDetails();
        $creditCard['name'] = $fullName;
        $creditCard['cvc'] = fake()->numberBetween(100, 999);

        $banking = [
            'IBAN' => fake()->iban('US'),
        ];

        return compact(
            'firstName',
            'lastName',
            'fullName',
            'address',
            'city',
            'zipCode',
            'state',
            'country',
            'creditCard',
            'banking'
        );
    }
}
