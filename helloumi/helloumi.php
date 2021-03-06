<?php
include_once "customer.php";
class Helloumi {
    var $url = "https://daisho.helloumi.com";
    var $token;
    var $options;
    var $crl;
    var $header = array();
    var $rest;

    function Helloumi($token) {
        $this->token = $token;
        $this->header[] = 'Content-type: application/json';
        $this->header[] = 'Authorization: Token '.$this->token;
        $this->crl = curl_init();
        curl_setopt($this->crl, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($this->crl, CURLOPT_POST, true);
        curl_setopt($this->crl, CURLOPT_RETURNTRANSFER, 1);

        if(!$this->check()){
            die($this->error);
        }
    }
    function check(){
        curl_setopt($this->crl, CURLOPT_URL, $this->url."/api/check/");
        $result = curl_exec($this->crl);
        $json = json_decode($result, true);
        if($json["success"])
            return True;
        else{
            $this->error = "Error: ".$json["detail"];
            return False;
        }
    }
    function getCustomer($id){
        $data = array("id" => $id);
        $data_string = json_encode($data);
        curl_setopt($this->crl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($this->crl, CURLOPT_URL, $this->url."/api/customer/get/");
        $result = curl_exec($this->crl);
        return new Customer(json_decode($result, true)["user"], $this);
    }
    function getCustomerFromPhone($phone){
        $data = array("phone" => $phone);
        $data_string = json_encode($data);
        curl_setopt($this->crl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($this->crl, CURLOPT_URL, $this->url."/api/customer/get/");
        $result = curl_exec($this->crl);
        return new Customer(json_decode($result, true)["user"], $this);
    }
    function getCustomerFromFacebook($facebook_id){
        $data = array("facebook_id" => $facebook_id);
        $data_string = json_encode($data);
        curl_setopt($this->crl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($this->crl, CURLOPT_URL, $this->url."/api/customer/get/");
        $result = curl_exec($this->crl);
        return new Customer(json_decode($result, true)["user"], $this);
    }
    function send($helloumi_id, $message){
        $data = array("id" => $helloumi_id, "message" => $message);
        $data_string = json_encode($data);
        curl_setopt($this->crl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($this->crl, CURLOPT_URL, $this->url."/api/send/");
        $result = curl_exec($this->crl);
        return json_decode($result, true);
    }
    function sendPhone($phone, $message){
        $data = array("phone" => $phone, "message" => $message);
        $data_string = json_encode($data);
        curl_setopt($this->crl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($this->crl, CURLOPT_URL, $this->url."/api/send/");
        $result = curl_exec($this->crl);
        return json_decode($result, true);
    }
    function sendFacebook($facebook_id, $message){
        $data = array("facebook_id" => $facebook_id, "message" => $message);
        $data_string = json_encode($data);
        curl_setopt($this->crl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($this->crl, CURLOPT_URL, $this->url."/api/send/");
        $result = curl_exec($this->crl);
        return json_decode($result, true);
    }
    function __destruct(){
        curl_close($this->crl);
    }
}
?>
