<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          UserSeeder::class,
        	CertificateSeeder::class,
        	RoleSeeder::class,
        	GenreSeeder::class,
        	ProducerSeeder::class,
        	ActorSeeder::class,
        	FilmSeeder::class,
          FilmProducerSeeder::class,
          FilmUserSeeder::class,
          ActorRoleSeeder::class,
        ]);
    }
}
// to rollback and re-run migrations run
// php artisan migrate:refresh --seed