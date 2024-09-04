<?php

namespace Database\Factories;

use App\Infra\Adapters\Persistence\Eloquent\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $passwd = bcrypt('password') ?? '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(35),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $passwd,
        ];
    }
}
