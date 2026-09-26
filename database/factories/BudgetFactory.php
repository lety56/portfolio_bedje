<?php

// Fichier: database/factories/BudgetFactory.php

namespace Database\Factories;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    protected $model = Budget::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paymentMethods = ['orange-money', 'mobile-money', 'bank-check'];
        $deliveryOptions = ['standard', 'express', 'pickup'];
        $statuses = ['pending', 'validated', 'rejected'];

        return [
            'payment_method' => $this->faker->randomElement($paymentMethods),
            'sale_percentage' => $this->faker->randomFloat(2, 5, 50),
            'discount' => $this->faker->optional(0.7)->randomFloat(2, 0, 20),
            'delivery_option' => $this->faker->randomElement($deliveryOptions),
            'delivery_destination' => $this->faker->city() . ', ' . $this->faker->country(),
            'message' => $this->faker->optional(0.6)->sentence(),
            'status' => $this->faker->randomElement($statuses),
            'total_amount' => $this->faker->optional(0.8)->randomFloat(2, 20, 500),
            'delivery_cost' => $this->faker->randomFloat(2, 0, 15),
            'validated_at' => $this->faker->optional(0.4)->dateTimeBetween('-1 month', 'now'),
        ];
    }

    /**
     * État pour un budget en attente
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'validated_at' => null,
        ]);
    }

    /**
     * État pour un budget validé
     */
    public function validated(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'validated',
            'validated_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
        ]);
    }

    /**
     * État pour un budget rejeté
     */
    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rejected',
            'validated_at' => null,
        ]);
    }
}