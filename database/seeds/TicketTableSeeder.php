<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Entities\Ticket;

/**
 * Description of TicketTableSeeder
 *
 * @author Anwar Sarmiento
 */
class TicketTableSeeder extends BaseSeeder {
    



    public function getDummyData(\Faker\Generator $faker, array $customValues = array()) {
        return [
            'title'=>$faker->sentence(),
            'status'=>$faker->randomElement(['open','open','closed']),
            'user_id'=> $this->getRandom('User')->id
        ];
    }

    public function getModel() {
        return new Ticket();
    }
   

//put your code here
}
