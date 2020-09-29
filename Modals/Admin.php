<?php

include '../Lib/Database.php';
include '../Lib/Messages.php';



class Admin
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
      $privilege = $data['privilege'];
      $photo = $data['photo'];


      /* Validation stuff  */
            //encrypt password
            $HashedPasword = password_hash($password,PASSWORD_BCRYPT);

  }


  //Admins
  public function Admins()
  {

      //Fetch all admins from database
      $query = "SELECT * FROM admin ORDER BY id DESC";

      $admins = $this->db->query($query);

      //Check if there is admins in the database
      if($admins){
        return $admins->fetchAll();
      }else{
        return NotFoundErrorMessage();
      }


  }

  //Insert admin
  public function AdminInsert($data)
  {
      //Validate data
      $this->dataValidation($data);

      //Insert Query
      $query = "INSERT INTO admin(name,lastName,email,password,privilege,photo) VALUES(?,?,?,?,?,?)";

      $admin_insert = $this->db->insert($query,[
          $name,$lastName,$email,$HashedPassword,$privilege,$photo
      ]);

      //Check if admin inserted into database
      if($admin_insert){
        return insert_success_message();
      }else{
        return insert_error_message();
      }



  }


  //Edit admin
  public function AdminEdit($id)
  {
      //Fetch admin query
      $query = "SELECT * FROM admin WHERE id = ?";

      $admin_fetch = $this->db->select($query,[$id]);

      //Check if admin exists
      if($admin_fetch){
        return $admin_fetch->fetch();
      }else{
        return NotFoundErrorMessage();
      }

  }

  //Update admin
  public function AdminUpdate($id,$data)
  {
      //Validate data
      $this->dataValidation($data);

      //Query update data from database
      $query = "UPDATE admin SET name=?,lastName=?,email=?,password=?,privilege=?,photo=? WHERE id = ?";

      $admin_update = $this->db->update($query,[
        $name,$lastName,$email,$HashedPassword,$privilege,$photo,$id
      ]);

      //Check if admin updated
      if($admin_update){
        return update_success_message();
      }else{
        return update_error_message():
      }


  }

  //Delete Admin
  public function AdminDelete($id)
  {
      //Delete  Admin
      $query = "DELETE  FROM admin WHERE id = ?";

      $admin_delete = $this->db->delete($query,[$id]);

      //Check if deleted
      if($admin_delete){
        return delete_success_message();
      }else{
        return delete_error_message();
      }


  }


}
