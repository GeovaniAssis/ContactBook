<?php 
  if( !isset($_SESSION) ){ session_start(); }
  include ('connection.php');

  $id_contact = $_POST["contact"] ;
  $cd_user    = $_SESSION["user"]["id"];
  

  if (!$conn) {
    echo 'Sorry, the system is temporarily out of service, please try again later.';
  }else{

    try{
      $sqlUpdate = $conn->prepare("
        UPDATE tb_contact 
        SET ic_active = 0
        WHERE cd_user = :cd_user
        AND cd_contact = :cd_contact;
      ");
      $sqlUpdate->bindValue( ':cd_user', $cd_user );
      $sqlUpdate->bindValue( ':cd_contact', $id_contact );
      $sqlUpdate->execute();

    }catch(PDOException $Exception ) {
      throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    }

    echo "true";
    
  }
?>