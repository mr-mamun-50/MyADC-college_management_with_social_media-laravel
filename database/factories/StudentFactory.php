<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
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

        $class = ['XI', 'XII', 'Old_Student'];
        $class_key = array_rand($class);

        $gndr = ['Male', 'Female'];
        $gndr_key = array_rand($gndr);

        $board = ['Barisal', 'Chittagong', 'Comilla', 'Dhaka', 'Dinajpur', 'Jessore', 'Mymensingh', 'Rajshahi', 'Sylhet'];
        $board_key = array_rand($board);

        return [
            'st_id' => '20'. rand(17, 22) . '-00' . rand(01, 99),
            'name' => $this->faker->name(),
            'session' => '20'. rand(17, 22) . '-20' . rand(18, 23),
            'department' => $depts[$dept_key],
            'c_class' => $class[$class_key],
            'fathers_name' => $this->faker->name($gender = 'male'),
            'mothers_name' => $this->faker->name($gender = 'female'),
            'dob' => $this->faker->date(),
            'gender' => $gndr[$gndr_key],
            'phone' => $this->faker->unique()->e164PhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'present_address' => $this->faker->address(),
            'permanent_address' => $this->faker->address(),
            'birth_reg_nid' => $this->faker->numberBetween($min = 1000000000, $max = 9999999999),
            'ssc_res' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 1.00, $max = 5.00),
            'ssc_board' => $board[$board_key],
            'ssc_dept' => $depts[$dept_key],
            'ssc_school' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'ssc_year' => $this->faker->year(),
        ];
    }
}
