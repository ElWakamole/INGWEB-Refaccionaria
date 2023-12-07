<?php
namespace App\Http\Clases;
class Users {
    private $id;
    private $local;
    private $role;
    private $name;
    private $lastnameP;
    private $lastnameM;
    private $email;
    private $permissions;
    private $address;
    private $phone;
    private $status;

    public function __construct($id, $local, $role, $name, $lastnameP, $lastnameM, $email, $permissions, $address, $phone, $status) {
        $this->id = $id;
        $this->local = $local;
        $this->role = $role;
        $this->name = $name;
        $this->lastnameP = $lastnameP;
        $this->lastnameM = $lastnameM;
        $this->email = $email;
        $this->permissions = $permissions;
        $this->address = $address;
        $this->phone = $phone;
        $this->status = $status;
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
    public function getPermissions() {
        return $this->permissions;
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

    public function getLocal() {
        return $this->local;
    }

    public function getRole() {
        return $this->role;
    }
    public function getStatus() {
        return $this->status;
    }
}