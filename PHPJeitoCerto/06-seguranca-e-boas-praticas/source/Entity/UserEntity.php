<?php

namespace Source\Entity;

use PDO;
use PDOException;
use Source\Database\Connect;

class UserEntity {

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $document;

    public function load($id)
    {
        try{
            $stmt = Connect::getInstance()->query("SELECT * FROM users WHERE id = $id");
            $stmt = $stmt->fetchObject();
            $this->userFormat($stmt->id, $stmt->first_name, $stmt->last_name, $stmt->email, $stmt->password, $stmt->document);
        } catch (PDOException $e){
            echo "Erro ao conectar: " . $e->getMessage();
        }
    }

    private function userFormat($id, $first_name, $last_name, $email, $password, $document){
    $this->id = $id;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email = $email;
    $this->password = $password;
    $this->document = $document;
    }

    public function save(){
        Connect::getInstance()->query("UPDATE users SET 
            first_name = '$this->first_name',
            last_name = '$this->last_name',
            email = '$this->email',
            password = '$this->password',
            document = '$this->document'
            WHERE id = $this->id
        ");
        $this->load($this->id);
    }

    public function find($email)
    {
        try{
            $stmt = Connect::getInstance()->query("SELECT * FROM users WHERE email = '$email'");
            if($stmt = $stmt->fetchObject()){
                $this->userFormat($stmt->id, $stmt->first_name, $stmt->last_name, $stmt->email, $stmt->password, $stmt->document);
            }
        } catch (PDOException $e){
            echo "Erro ao conectar: " . $e->getMessage();
        }
    }
}
