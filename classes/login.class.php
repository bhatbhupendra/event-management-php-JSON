<?php
class LoginUser{
   // class properties --------------------------------------
   private $email;
   private $password;
   public $error;
   public $success;
   private $storage = "userData.json";
   private $stored_users;
   public $userData;
 
   // class methods -----------------------------------------
   public function __construct($email, $password){
      $this->email = $email;
      $this->password = $password;
      $this->stored_users = json_decode(file_get_contents($this->storage), true);
      $this->login();
   }
 
   private function login(){
      foreach ($this->stored_users as $user) {
         if($user['email'] == $this->email){
            if(password_verify($this->password, $user['password'])){
               // You can set a session and redirect the user to his account.
               return  $this->success = "You are loged in";
            }
         }
      }
      return $this->error = "Wrong username or password";
   }
} // end of class