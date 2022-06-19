<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $endedDate = $this->faker->dateTimeInInterval('-5 days');

        return [
            'params'        => json_encode(
                [
                    'mobile_mode' => $this->faker->boolean,
                    'toSearch'    => [
                        'url'  => $this->faker->url,
                        'name' => $this->faker->word,
                    ],
                    'geolocation' => [
                        'display'     => $this->faker->country,
                        'language'    => [
                            'lang'            => $this->faker->languageCode,
                            'accept-language' => $this->faker->languageCode,
                        ],
                        'timezone'    => $this->faker->timezone,
                        'mobile'      => [
                            'android' => $this->faker->numberBetween(1, 100),
                            'ios'     => $this->faker->numberBetween(1, 100),
                        ],
                        'countryCode' => $this->faker->countryCode,
                        'region'      => Str::random(3),
                        'city'        => Str::random(3),
                    ],
                ]
            ),
            'position'      => $this->faker->unique()->numberBetween(1, 1000),
            'ended_at'      => $endedDate,
            'ended_at_date' => $endedDate->format('Y-m-d'),
        ];
    }
}
