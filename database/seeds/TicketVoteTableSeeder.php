<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Entities\TicketVote;
/**
 * Description of TicketVoteTableSeeder
 *
 * @author Anwar Sarmiento
 */
class TicketVoteTableSeeder extends BaseSeeder{
    
  protected $total =250;
     
    public function getDummyData(\Faker\Generator $faker, array $customValues = array()) {
        return [
            'user_id'=>  $this->getRandom('User')->id,
            'ticket_id'=> $this->getRandom('Ticket')->id,
        ];
    }

    public function getModel() {
        return new TicketVote();
    }

//put your code here
}
