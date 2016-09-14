<?php

class Customer {
    function Customer($data, $helloumi) {
        $this->helloumi = $helloumi;
        $this->helloumi_id = $data["id"];
        $this->name = $data["name"];
        $this->phone = $data["phone"];
        $this->channel = $data["channel"];
        $this->facebook_id = $data["facebook_id"];
        $this->avatar = $data["avatar"];
        $this->email = $data["email"];
        $this->city = $data["city"];
        $this->address = $data["address"];
        $this->country = $data["country"];
        $this->zip = $data["zip"];
        $this->register_date = $data["register_date"];
        $this->birthdate = $data["birthdate"];
    }
    function send($message){
        return $this->helloumi->send($this->phone, $message);
    }
    function getID(){
      return $this->helloumi_id;
    }
    function getName(){
        return $this->name;
    }
    function getPhone(){
        return $this->phone;
    }
    function getChannel(){
        return $this->channel;
    }
    function getFacebookId(){
        return $this->facebook_id;
    }
    function getAvatar(){
        return $this->avatar;
    }
    function getEmail(){
        return $this->email;
    }
    function getCity(){
        return $this->city;
    }
    function getAddress(){
        return $this->address;
    }
    function getCountry(){
        return $this->country;
    }
    function getZip(){
        return $this->zip;
    }
    function getRegisterDate(){
        return $this->register_date;
    }
    function getBirthDate(){
        return $this->birthdate;
    }
}
?>
