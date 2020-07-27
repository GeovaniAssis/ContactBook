<?php 
  if( !isset($_SESSION) ){ session_start(); }
  include ('connection.php');

  $id_contact = $_POST["id"];
  $cd_user    = $_SESSION["user"]["id"];
  $answer     = "";

  if (!$conn) {
    echo 'Sorry, the system is temporarily out of service, please try again later.';
  }else{

    try{
      $sql = $conn->prepare("
        SELECT ds_telephone
        FROM tb_telephone
        WHERE cd_contact = :cd_contact;
      ");

      $sql->bindValue( ':cd_contact', $id_contact );
      $sql->execute();
      $phones = $sql->fetchAll();

    }catch(PDOException $Exception ) {
      throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    }

    foreach ($phones as $phone) {
      $answer .= $phone["ds_telephone"];
      $answer .= "<br>";
    }

    echo $answer;
    
  }
?>