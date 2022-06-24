<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $depts = ['Science', 'Humanities', 'Business'];
        $dept_key = array_rand($depts);

        $position = ['Professor', 'Assistant Professor', 'Lecturer'];
        $pos_key = array_rand($position);

        $gndr = ['Male', 'Female'];
        $gndr_key = array_rand($gndr);

        return [
            'index' => $this->faker->numberBetween($min = 100000, $max = 999999),
            'name' => $this->faker->name(),
            'position' => $position[$pos_key],
            'department' => $depts[$dept_key],
            'subject' => $depts[$dept_key],
            'fathers_name' => $this->faker->name($gender = 'male'),
            'mothers_name' => $this->faker->name($gender = 'female'),
            'dob' => $this->faker->date(),
            'gender' => $gndr[$gndr_key],
            'phone' => $this->faker->unique()->e164PhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'present_address' => $this->faker->address(),
            'permanent_address' => $this->faker->address(),
            'nid' => $this->faker->numberBetween($min = 1000000000, $max = 9999999999),
            'edu_qualification' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'salary' => $this->faker->numberBetween($min = 30000, $max = 50000)
        ];
    }
}
