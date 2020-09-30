<?php

include '../Lib/Database.php';
include '../Lib/Messages.php';



class Model
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
        $totalDownloads = $data['totalDownloads'];
        $numberFaces = $data['numberFaces'];
        $perimetre = $data['perimetre'];
        $scalable = $data['scalable'];
        $cost = $data['cost'];
        $ThreeDrenderWireFrame  = $data['ThreeDrenderWireFrame'];

        //Validation stuff

  }



  //All models
  public function models()
  {
        //Query
        $query = "SELECT * FROM model ORDER BY id DESC";

        //Fetch all Models
        $models = $this->db->query($query);

        //Check if there is any models in the database
        if($models){
          return $models->fetchAll();
        }else{
          return NotFoundErrorMessage();
        }
  }

  //Insert Model
  public function model_insert($data)
  {

      //Validate data
      $this->data_validation($data);

      //Query
      $query = "INSERT INTO model(name,rating,dateSubmission,totalDownloads,numberFaces,perimetre,scalable,cost,ThreeDrenderWireFrame)
                            VALUES(?,?,?,?,?,?,?,?,?)";

      //insert into database
      $model_insert = $this->db->insert($query,[
          $name,$rating,$dateSubmission,$totalDownloads,$numberFaces,$scalable,$cost,$ThreeDrenderWireFrame
      ]);


      //Check if inserted into database
      if($model_insert){
        return insert_success_message();
      }else{
        return insert_error_message();
      }
  }


  //Edit Model
  public function model_edit($id)
  {
    //Query
    $query = "SELECT * FROM model WHERE id =?";

    //Fetch model
    $model_fetch = $this->db->select($query,[$id]);

    //Check if exists
    if($model_fetch){
      return $model_fetch->fetch();
    }else{
      return NotFoundErrorMessage();
    }
  }


  //Update Model
  public function model_update($id,$data)
  {
    //Validate data
    $this->data_validation($data);


    //Query
    $query = "UPDATE model SET $name =?,
                               $rating=?,
                               $dateSubmission=?,
                               $totalDownloads=?,
                               $numberFaces=?,
                               $scalable=?,
                               $cost=?,
                               $ThreeDrenderWireFrame=?
                               WHERE id = ?";


    //Update data
    $model_update = $this->db->update($query,[
      $name,$rating,$dateSubmission,$totalDownloads,$numberFaces,$scalable,$cost,$ThreeDrenderWireFrame,$id
    ]);


    //Check if data updated
    if($model_update){
      return update_success_message();
    }else{
      return udpate_error_message();
    }
  }


  //Delete model
  public function model_delete($id)
  {
    //Query
    $query = "DELETE FROM model WHERE id = ?";

    //Delete model from database
    $model_delete = $this->db->delete($query,[$id]);

    //Check if deleted from database
    if($model_delete){
      return delete_success_message();
    }else{
      return delete_error_message();
    }
  }


}
