<?php

namespace Database\Seeders;

use App\Enumerations\RoleEnum;
use App\Models\User;
use Faker\Provider\Uuid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Create default administrator profile*/
        User::query()->create([
            "name" => "Administrator",
            "email" => "admin@recruitohr.com",
            "role" =>RoleEnum::ADMINISTRATOR->value,
            "password" => Hash::make('root'),
            "status" => true
        ]);
    }
}
