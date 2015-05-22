<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Entities\TicketComment;
use Faker\Generator;
/**
 * Description of TicketCommentTableSeeder
 *
 * @author Anwar Sarmiento
 */
class TicketCommentTableSeeder extends BaseSeeder {
    
    protected $total =250;


    public function getDummyData(Generator $faker, array $customValues = array()) {
        return [
            'user_id'=>  $this->getRandom('User')->id,
            'ticket_id'=> $this->getRandom('Ticket')->id,
            'comment'=> $faker->paragraph(),
            'link'=> $faker->randomElement(['','',$faker->url])
        ];
    }

    public function getModel() {
        return new TicketComment();
    }
//put your code here
}
