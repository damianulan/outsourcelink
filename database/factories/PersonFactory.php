<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->numberBetween($min = 0, $max = 1);
        $Min = 0;
        $Max = 0;
        if($type < 1){
            $Min = 1;
            $Max = 6;
        }
        else{
            $Min = 7;
            $Max = 12;
        }
        $status_id = $this->faker->numberBetween($Min, $Max);

        return [
            'type' => $type,
            'firstname' => $this->faker->firstNameMale(),
            'secondname' => $this->faker->firstNameMale(),
            'surname' => $this->faker->lastName(),
            'f_name' => $this->faker->firstNameMale(),
            'm_name' => $this->faker->firstNameFemale(),
            'sex' => 'm',
            'birthdate' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'birthplace' => $this->faker->city(),
            'citizenships_id' => $this->faker->numberBetween($min = 1, $max = 192),
            'nations_id' => $this->faker->numberBetween($min = 1, $max = 246),
            'notes' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'created_by' => 2,
            'last_editor' => 2,
            'status_id' => $status_id,
            'nin' => $this->faker->numberBetween($min = 70111111111, $max = 99121299999),
            'nin2' => $this->faker->numberBetween($min = 70111111111, $max = 99121299999),
            'tin' => $this->faker->numberBetween($min = 70111111111, $max = 99121299999),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'res_country' => $this->faker->numberBetween($min = 1, $max = 246),
            'mail_country' => $this->faker->numberBetween($min = 1, $max = 246),
            'res_street' => $this->faker->streetName(),
            'mail_street' => $this->faker->streetName(),
            'res_flat' => $this->faker->buildingNumber(),
            'mail_flat' => $this->faker->buildingNumber(),
            'res_postal' => $this->faker->postcode(),
            'mail_postal' => $this->faker->postcode(),
            'res_mailbox' => $this->faker->city(),
            'mail_mailbox' => $this->faker->city(),
            'res_place' => $this->faker->city(),
            'mail_place' => $this->faker->city(),
            'res_district' => $this->faker->streetSuffix(),
            'mail_district' => $this->faker->streetSuffix(),
            'res_commune' => $this->faker->streetSuffix(),
            'mail_commune' => $this->faker->streetSuffix(),

            'phone' => $this->faker->e164phoneNumber(),
            'phone_notes' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'email' => $this->faker->freeEmail(),
            'email_notes' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'viber' => $this->faker->e164phoneNumber(),
            'viber_notes' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'whatsapp' => $this->faker->e164phoneNumber(),
            'whatsapp_notes' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'telegram' => $this->faker->e164phoneNumber(),
            'telegram_notes' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'other_contact' => $this->faker->e164phoneNumber(),
            'other_contact_notes' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),

            'created_at' => $this->faker->dateTimeBetween('-3 months', '-1 week')->format('Y-m-d')
        ];
    }
}
