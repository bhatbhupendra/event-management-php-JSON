<?php
class RegisterUser{
   // class properties.
   private $name;
   private $email;
   private $contact;
   private $raw_password;
   private $encrypted_password;
   public $error;
   public $success;
   private $storage = "userData.json";
   private $stored_users; // array
   private $new_user; // array

   public function __construct($name, $email,$contact,$password){
      $this->name = filter_var(trim($name), FILTER_SANITIZE_STRING);
      $this->email = filter_var(trim($email), FILTER_SANITIZE_STRING);
      $this->contact = filter_var(trim($contact), FILTER_SANITIZE_STRING);
      $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
      $this->encrypted_password = password_hash($password, PASSWORD_DEFAULT);
      $this->stored_users = json_decode(file_get_contents($this->storage), true);
      $this->new_user = [
         "name" => $this->name,
         "email" => $this->email,
         "contact" => $this->contact,
         "password" => $this->encrypted_password,
      ];
   }
   private function checkFieldValues(){
      if(empty($this->email) || empty($this->raw_password)){
         $this->error = "Both fields are required.";
         return false;
      }else{
         return true;
      }
   }
   private function emailExists(){
      foreach ($this->stored_users as $user) {
         if($this->email == $user['email']){
            $this->error = "Username already taken, please choose a different one.";
            return true;
         }
      }
   }
   private function insertUser(){
      if($this->emailExists() == FALSE){
         array_push($this->stored_users, $this->new_user);
         if(file_put_contents($this->storage, json_encode($this->stored_users))){
            return $this->success = "Your registration was successful";
         }else{
            return $this->error = "Something went wrong, please try again";
         }
      }
   }

}