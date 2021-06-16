<?php

use App\User;
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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $kasir->assignRole('kasir');

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $manager->assignRole('manager');
    }
}
