<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Generator;

/**
 * Description of BaseSeeder
 *
 * @author Anwar Sarmiento
 */
abstract class BaseSeeder extends Seeder {

    protected static $pool;
    //put your code here
    protected function createMultiple($total) {


        for ($i = 0; $i <= $total; $i++):
            $this->create();

        endfor;
    }

    abstract public function getModel();

    abstract public function getDummyData(Generator $faker, array $customValues = array());

    protected function create(array $customValues = array()) {
        $values = $this->getDummyData(Faker::create(), $customValues);
        $values = array_merge($values, $customValues);
       return $this->addToPool($this->getModel()->create($values));
    }

    protected function createFrom($seeder,array $customValues = array() ){
        $seeder= new $seeder;
        return $seeder->create($customValues);
    }
    
    protected function getRandom($model){
        return static::$pool[$model]->random();
    }
    private function addToPool($entity){
        $class = get_class($entity);
        
        if(!isset(static::$pool[$class] )):
            static::$pool[$class]= new Collection();
        endif;
        
        static::$pool[$class]->add($entity);
    }
}
