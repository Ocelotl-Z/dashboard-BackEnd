<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Employee::create([
            'name' => 'Erick',
            'paternal_surname' => 'Ocelotl',
            'maternal_surname' => 'Castro',
            'email' => 'ocelotl@gmail.com',
            'password' => Hash::make('admin123'),
            'company_id' => 1
        ])->assignRole('Admin');

        Employee::factory(10)->create();
    }
}
