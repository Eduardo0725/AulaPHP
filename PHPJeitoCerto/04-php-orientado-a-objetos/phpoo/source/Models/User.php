<?php

namespace Source\Models;

use PDOException;
use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer{

    /**
     * User constructor.
     */
    public function __construct(){
        parent::__construct( "tb_users", ["first_name", "last_name", "email", "passwd"]);
    }

    /**
     * @return bool
     */
    public function save():bool{
        try{
            if($this->id){
                $user = $this->find("email = :e AND id != :i", "e={$this->email}&id={$this->id}")->count();
            }else{
                $user = $this->find("email = :e", "e={$this->email}")->count();
            }

            if($user){
                throw new PDOException("O email que você tentou cadastrar ja existe!");
            }

            return parent::save();
        } catch (PDOException $e){
            $this->fail = $e;
            return false;
        }

        
    }
}