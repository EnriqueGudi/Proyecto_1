<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsuariosVPN>
 */
class UsuariosVPNFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empleado' => $this->faker->name,
            'user_login' => $this->faker->name,
            'bu' => $this->faker->name,
            'area' => $this->faker->name,
            'puesto' => $this->faker->name,
            'email' => $this->faker->name,
            'serv_puer_form' => $this->faker->name,
            'grupo_mega_vpv' => $this->faker->name,
            'autentucacion' => $this->faker->name,
            'comentarios' => $this->faker->name,
            'formato' => $this->faker->name,
            'estado' => $this->faker->name,
            'expiracion' => $this->faker->name,
            'jefe' => $this->faker->name,
        ];
    }
}