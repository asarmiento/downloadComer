<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use App\Entities\User;
use Faker\Factory as Faker;
use Faker\Generator;

/**
 * Description of UserTableSedeer
 *
 * @author Anwar Sarmiento
 */
class UserTableSeeder extends BaseSeeder {

 
    public function getModel() {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array()) {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('admin')
        ];
    }

    //put your code here
    public function run() {



        $this->createAdmin();

        $this->createMultiple(50);
    }

    private function createAdmin() {
        User::create([
            'name' => 'Anwar Sarmiento',
            'email' => 'anwarsarmiento@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }

}
