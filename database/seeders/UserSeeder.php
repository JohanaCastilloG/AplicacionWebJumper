<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'name' => 'Johana',
           'apellido' => 'Castillo', 
           'telefono' => '545567789',
           'email' => 'johana@gmail.com',
           'password' => bcrypt('123456789')
       ])->assignRole('Administrador');
    }
}
