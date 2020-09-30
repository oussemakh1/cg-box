<?php

include '../Lib/Database.php';
include '../Lib/Messages.php';



class Pattern
{

  //Inherit database
  private $db;

  public function __construct()
  {
      $this->db = new Database();
  }


  //Validation
  private function data_validation($data)
  {
      $name = $data['name'];
      $rating = $data['rating'];
      $dateSubmission = $data['dateSubmission'];
      $cost = $data['cost'];
      $totalDownloads = $data['totalDownloads'];
  }



  //Patterns
  public function patterns()
  {
    //Query
    $query = "SELECT * FROM pattern ORDER BY id DESC";

    //Fetch patterns
    $patterns = $this->db->query($query);

    //Chekc if patterns exists
    if($patterns){
      return $patterns->fetchAll();
    }else{
      return NotFoundErrorMessage();
    }
  }


  //Insert pattern
  public function pattern_insert($data)
  {
     //Validation
     $this->data_validation($data);


     //Query
     $query = "INSERT INTO  pattern(name,rating,dateSubmission,cost,totalDownloads) VALUES(?,?,?,?,?)";

     //Insert into database
     $pattern_insert = $this->db->insert($query,[
        $name,$rating,$dateSubmission,$cost,$totalDownloads
     ]);

     //Check if inserted into database
     if($pattern_insert){
       return insert_success_message();
     }else{
       return insert_error_message();
     }
  }


  //Edit pattern
  public function pattern_edit($id)
  {
      //Query
      $query  = "SELECT * FROM pattern WHERE id = ?";

      //Fetch pattern
      $pattern_edit = $this->db->select($query,[$id]);

      //Check if pattern exists
      if($pattern_edit){
        return $pattern_edit->fetch();
      }else{
        return NotFoundErrorMessage();
      }

  }


  //Update pattern
  public function pattern_update($id,$data)
  {
    //Validation
    $this->data_validation($data);


    //Query
    $query = "UPDATE pattern SET  $name =?,
                                  $rating=?,
                                  $dateSubmission=?,
                                  $cost=?,
                                  $totalDownloads=?
                                  WHERE id = ?";

    //Update pattern
    $pattern_update = $this->db->update($query,[
      $name,$rating,$dateSubmission,$cost,$totalDownloads,$id
    ]);

    //Check if updated
    if($pattern_update){
      return update_success_message();
    }else{
      return update_error_message();
    }
  }


  //Delete pattern
  public function pattern_delete($id)
  {
    //Query
    $query = "DELETE FROM pattern WHERE  id =?";

    //Delete from database
    $pattern_delete = $this->db->delete($query,[$id]);

    //Check if deleted
    if($pattern_delete){
      return delete_success_message();
    }else{
      return delete_error_message();
    }
  }


}
