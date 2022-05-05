<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        return User::create([
                    "name" => "Dr. Juan Sarmiento",
                    "email" => "pruebas@amobasoftware.com",
                    "password" => "134679"
        ]);
    }

}
