<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345),
            'type_user' => 1
        ]);
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make(12345),
            'type_user' => 0
        ]);

        $this->call([
            ProdutoSeeder::class,
        ]);
    }
}
