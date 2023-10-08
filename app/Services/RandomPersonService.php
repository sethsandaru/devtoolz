<?php

namespace App\Services;
use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;
use Faker\Provider\en_US\Address;

class RandomPersonService
{
    private Faker $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }


    /**
     * Random data for a fake person in US
     *
     * @TODO: we will implement the other countries soon
     */
    public function random(): array
    {
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();
        $fullName = "$firstName $lastName";
        $address = $this->faker->streetAddress();
        $city = $this->faker->city();
        $zipCode = Address::postcode();
        $state = Address::stateAbbr();
        $country = 'US';

        $creditCard = $this->faker->creditCardDetails();
        $creditCard['name'] = $fullName;
        $creditCard['cvc'] = $this->faker->numberBetween(100, 999);

        $banking = [
            'IBAN' => $this->faker->iban('US'),
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
