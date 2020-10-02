<?php

include '../Lib/Database.php';
include '../Lib/Messages.php';



class Transaction
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
        $userId = $data['userId'];
        $transactionId = $data['transactionId'];
        $planId = $data['planId'];
        $transactionDate = $data['transactionDate'];
        $payementMethod = $data['payementMethod'];
        $amount = $data['amount'];
        $currency = $data['currency'];

  }




//Transactions
public function transactions()
{
  //Query
  $query = "SELECT  * FROM transaction ORDER BY id DESC";

  //Fetch transactions
  $transactions = $this->db->query($query);

  //Check if data exists
  if($transactions){
    return $transactions->fetchAll();
  }else{
    return NotFoundErrorMessage();
  }
}


//Insert transaction
public function transaction_insert($data)
{
  //Validation
  $this->data_validation($data);

  //Query
  $query = "INSERT INTO transaction(userId,transactionId,planId,transactionDate,payementMethod,amount,currency) VALUES(?,?,?,?,?,?,?)";

  //Insert into database
  $transaction_insert = $this->db->insert($query,[
        $userId,$transactionId,$planId,$transactionDate,$payementMethod,$amount,$currency
  ]);


  ///Check if inserted into database
  if($transaction_insert){
    return insert_success_message();
  }else{
    return insert_error_message();
  }
}


//Update transaction
public function transaction_update($id,$data)
{
  //validation
  $this->data_validation($data);

  //Query
  $query = "UPDATE transaction SET userId=?,
                                   transactionId=?,
                                   planId=?,
                                   transactionDate=?,
                                   payementMethod=?,
                                   amount=?,
                                   currency=?
                                   WHERE id=? ";

   $transaction_update = $this->db->update($query,[
     $userId,$transactionId,$planId,$transactionDate,$payementMethod,$amount,$currency,$id
   ]);
}


//Delete transaction
public function transaction_delete($id)
{
  //Query
  $query = "DELETE FROM transaction WHERE id = ?;

  $transaction_delete = $this->db->delete($query,[$id]);
}
