<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Description of BaseSeeder
 *
 * @author Anwar Sarmiento
 */
abstract class BaseSeeder extends Seeder {

    protected static $pool;
    protected $total = 50;

    public function run() {
        $this->createMultiple($this->total);
    }

    //put your code here
    protected function createMultiple($total) {


        for ($i = 0; $i <= $total; $i++):
            $this->create();

        endfor;
    }

    abstract public function getModel();
    /** */
    abstract public function getDummyData(Generator $faker, array $customValues = array());
    /**
     * 
     * @param array $customValues
     * @return type
     */
    protected function create(array $customValues = array()) {
        $values = $this->getDummyData(Faker::create(), $customValues);
        $values = array_merge($values, $customValues);
        return $this->addToPool($this->getModel()->create($values));
    }
    /**
     * 
     * @param seeder $seeder
     * @param array $customValues
     * @return type
     */
    protected function createFrom($seeder, array $customValues = array()) {
        $seeder = new $seeder;
        return $seeder->create($customValues);
    }
    /**
     * 
     * @param type $model
     * @return type
     */
    protected function getRandom($model) {
        return static::$pool[$model]->random();
    }
    /**
     * 
     * @param type $entity
     */
    private function addToPool($entity) {
        
        $reflection = new ReflectionClass($entity);
        $class = $reflection->getShortName();

        if (!$this->collectionExist($class)):
            static::$pool[$class] = new Collection();
        endif;

        static::$pool[$class]->add($entity);
    }
    private function collectionExist($class){
        return isset(static::$pool[$class]);
    }
}
