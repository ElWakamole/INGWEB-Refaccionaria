<?php
namespace App\Http\Clases;
class Users {
    private $id;
    private $name;
    private $lastnameP;
    private $lastnameM;
    private $email;
    private $address;
    private $phone;

    public function __construct($id, $name, $lastnameP, $lastnameM, $email, $address, $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->lastnameP = $lastnameP;
        $this->lastnameM = $lastnameM;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastnameP() {
        return $this->lastnameP;
    }

    public function getLastnameM() {
        return $this->lastnameM;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getId(){
        return $this->id;
    }
}