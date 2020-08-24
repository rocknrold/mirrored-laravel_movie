<?php

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
        factory(App\User::class,10)->create();

        App\User::create([
        	'name'=>'admin',
        	'email'=> 'admin@example.com',
        	'email_verified_at'=> now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => true,
        	'remember_token' => Str::random(10),
        ]);

    }
}