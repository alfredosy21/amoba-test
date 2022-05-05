<?php

use Illuminate\Database\Seeder;
use App\Person;

class PersonsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        return Person::insert([
                    [
                        "first_name" => "Iván Fabricio",
                        "last_name" => "Cordero Pauta",
                        "document" => uniqid(),
                        "type_person" => "1"
                    ],
                    [
                        "first_name" => "Iván Fabricio",
                        "last_name" => "Cordero Pauta",
                        "document" => uniqid(),
                        "type_person" => "1"
                    ],
                    [
                        "first_name" => "Iván Fabricio",
                        "last_name" => "Cordero Pauta",
                        "document" => uniqid(),
                        "type_person" => "1"
                    ],
                    [
                        "first_name" => "Iván Fabricio",
                        "last_name" => "Cordero Pauta",
                        "document" => uniqid(),
                        "type_person" => "1"
                    ],
                    [
                        "first_name" => "Iván Fabricio",
                        "last_name" => "Cordero Pauta",
                        "document" => uniqid(),
                        "type_person" => "1"
                    ],
                    [
                        "first_name" => "Iván Fabricio",
                        "last_name" => "Cordero Pauta",
                        "document" => uniqid(),
                        "type_person" => "1"
                    ],
                    [
                        "first_name" => "Iván Fabricio",
                        "last_name" => "Cordero Pauta",
                        "document" => uniqid(),
                        "type_person" => "1"
                    ],
                    [
                        "first_name" => "Pedro",
                        "last_name" => "Palacios",
                        "document" => uniqid(),
                        "type_person" => "0"
                    ],
                    [
                        "first_name" => "Pedro",
                        "last_name" => "Palacios",
                        "document" => uniqid(),
                        "type_person" => "0"
                    ],
                    [
                        "first_name" => "Pedro",
                        "last_name" => "Palacios",
                        "document" => uniqid(),
                        "type_person" => "0"
                    ],
                    [
                        "first_name" => "Pedro",
                        "last_name" => "Palacios",
                        "document" => uniqid(),
                        "type_person" => "0"
                    ],
                    [
                        "first_name" => "Pedro",
                        "last_name" => "Palacios",
                        "document" => uniqid(),
                        "type_person" => "0"
                    ],
                    [
                        "first_name" => "Pedro",
                        "last_name" => "Palacios",
                        "document" => uniqid(),
                        "type_person" => "0"
                    ],
                    [
                        "first_name" => "Pedro",
                        "last_name" => "Palacios",
                        "document" => uniqid(),
                        "type_person" => "0"
                    ]
        ]);
    }

}
