<?php

include '../Lib/Database.php';
include '../Lib/Messages.php';



class Invoice
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

    $invoiceId = $data['invoiceId'];
    $userId  = $data['userId'];
    $planId = $data['planId'];
    $downloadId = $data['downloadId'];
    $modelId = $data['modelId'];
    $patternId = $data['patternId'];
    $downloadDate = $data['date'];
    $coinSpent=$data['coinSpent'];


  }



  //Invoices
  public function Invoices()
  {
      //Query
      $query = "SELECT * FROM invoice ORDER BY id DESC";

      $invoices = $this->db->query($query);

      //Check if invoices exists
      if($invoices){
        return $invoices->fetchAll();
      }else{
        return NotFoundErrorMessage();
      }

  }


//Insert Invoice
public function invoice_insert($data)
{
  //Validation
  $this->data_validation($data);

  //Query
  $query = "INSERT INTO invoice(userId,planId,dowloadId,modelId,patternId,downloadDate,coinSpent) VALUES(?,?,?,?,?,?)";

  //Insert Into databse
  $invoice = $this->db->insert($query,[
      $userId,$planId,$downloadId,$modelId,$patternId,$downloadDate,$coinSpent
  ]);

  //Check if inserted
  if($invoice){
    return insert_success_message();
  }else{
    return insert_error_message();
  }

}


//Update invoice
public function invoice_update($id,$data)
{
  //Validation
  $this->data_validation($data);

  //Query
  $query = "UPDATE invoice SET userId=?,
                               planId=?,
                               dowloadId=?,
                               modelId=?,
                               patternId=?,
                               downloadDate=?,
                               coinSpent=?
                               WHERE id =?";
  //Update invoice
  $invoice_update = $this->db->update($query,[
    $userId,$planId,$downloadId,$modelId,$patternId,$downloadDate,$coinSpent,$id
  ]);

  //Check if updated
  if($invoice_update){
    return update_success_message();
  }else{
    return update_error_message();
  }
}

//Delete invoice
public function invoice_delete($id)
{
  //Query
  $query = "DELETE FROM invoice WHERE id =?";

  //Delete invoice
  $invoice_delete = $this->db->delete($query,[$id]);

  //Check if deleted
  if($invoice_delete){
    return delete_success_message();
  }else{
    return delete_error_message();
  }
}
