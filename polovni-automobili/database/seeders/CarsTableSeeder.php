<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2020,
                'max_speed' => 200,
                'is_automatic' => true,
                'engine' => 'Petrol',
                'number_of_doors' => 4
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'year' => 2019,
                'max_speed' => 190,
                'is_automatic' => true,
                'engine' => 'Petrol',
                'number_of_doors' => 4
            ],
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'year' => 2019,
                'max_speed' => 190,
                'is_automatic' => true,
                'engine' => 'Petrol',
                'number_of_doors' => 4
            ]
        ];
        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
