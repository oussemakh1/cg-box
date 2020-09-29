<?php

include '../Lib/Database.php';
include '../Lib/Messages.php';



class User
{

  //Inherit database
  private $db;

  public function __construct()
  {
      $this->db = new Database();
  }


  //Data validation
  private function dataValidation($data)
  {

      $name = $data['name'];
      $lastName = $data['lastName'];
      $email = $data['email'];
      $password = $data['password'];
      $country = $data['country'];
      $currentPlan = $data['currentPlan'];
      $purchaseDate = $data['purchaseDate'];
      $expectedPlanEnd = $data['expectedPlanEnd'];
      $status = $data['status'];
      $photo = $data['photo'];
      $colorCut = $data['colorCut'];
      $colorEngraving = $data['colorEngraving'];
      $colorTracing= $data['colorTracing'];
      $cutSpeed = $data['cutSpeed'];
      $payementMethod = $data['payementMethod'];
      $transaction = $data['transaction'];
      $coins = $data['coins'];


      /* Validation stuff  */
            //encrypt password
            $HashedPasword = password_hash($password,PASSWORD_BCRYPT);

  }

  //Users
  public function Users()
  {

      //Fetch all Users from database
      $query = "SELECT * FROM user ORDER BY id DESC";

      $Users = $this->db->query($query);

      //Check if there is Users in the database
      if($Users){
        return $Users->fetchAll();
      }else{
        return NotFoundErrorMessage();
      }


  }

  //Insert user
  public function UserInsert($data)
  {
      //Validate data
      $this->dataValidation($data);

      //Insert Query
      $query = "INSERT INTO user(name,lastName,email,password,country,currentPlan,purchaseDate,expectedPlanEnd,status,photo,colorCut,colorEngraving,colorTracing,cutSpeed,payementMethod,transaction,coins)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

      $user_insert = $this->db->insert($query,[
          $name,$lastName,$email,$HashedPassword,$country,$currentPlan,$purchaseDate,$expectedPlanEnd,$status,$photo,
          $colorCut,$colorEngraving,$colorTracing,$cutSpeed,$payementMethod,$transaction,$coins
      ]);

      //Check if user inserted into database
      if($user_insert){
        return insert_success_message();
      }else{
        return insert_error_message();
      }



  }


  //Edit user
  public function UserEdit($id)
  {
      //Fetch user query
      $query = "SELECT * FROM user WHERE id = ?";

      $user_fetch = $this->db->select($query,[$id]);

      //Check if user exists
      if($user_fetch){
        return $user_fetch->fetch();
      }else{
        return NotFoundErrorMessage();
      }

  }

  //Update user
  public function UserUpdate($id,$data)
  {
      //Validate data
      $this->dataValidation($data);

      //Query update data from database
      $query = "UPDATE user SET name =?,
                                lastName=?,
                                email=?,
                                password=?,
                                country=?,
                                currentPlan=?,
                                purchaseDate=?,
                                expectedPlanEnd=?,
                                status=?,
                                photo=?,
                                colorCut=?,
                                colorEngraving=?,
                                colorTracing=?,
                                cutSpeed=?,
                                payementMethod=?,
                                transaction=?,
                                coins=?
                                WHERE id = ?" ;

      $user_update = $this->db->update($query,[
        $name,$lastName,$email,$HashedPassword,$country,$currentPlan,$purchaseDate,$expectedPlanEnd,$status,$photo,
        $colorCut,$colorEngraving,$colorTracing,$cutSpeed,$payementMethod,$transaction,$coins,$id
        ]);

      //Check if user updated
      if($user_update){
        return update_success_message();
      }else{
        return update_error_message():
      }


  }

  //Delete User
  public function UserDelete($id)
  {
      //Delete  user
      $query = "DELETE  FROM user WHERE id = ?";

      $user_delete = $this->db->delete($query,[$id]);

      //Check if deleted
      if($user_delete){
        return delete_success_message();
      }else{
        return delete_error_message();
      }


  }


}
