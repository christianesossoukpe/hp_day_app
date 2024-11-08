<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Appeler les seeders spécifiques ici
        $this->call([
            DatabaseSeederUsers::class,
            DatabaseSeederBirthdays::class,
            DatabaseSeederNotifications::class,
            // DatabaseSeederEmails::class,
            // DatabaseSeederFriends::class,
            // DatabaseSeederProfiles::class,
            // DatabaseSeederSettings::class,
        ]);
    }
}