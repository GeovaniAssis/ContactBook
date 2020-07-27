<?php 
  include ('connection.php');
  if (!$conn) {
    echo 'Sorry, the system is temporarily out of service, please try again later.';
  }else{

    try{
      $sql = $conn->prepare("
        SELECT *
        FROM tb_contact
        WHERE cd_user = :cd_user
        AND ic_active = 1
        ORDER BY nm_contact ASC;");

      $sql->bindValue(':cd_user', $_SESSION["user"]["id"]);

      $sql->execute();
      $contacts = $sql->fetchAll();

    }catch(PDOException $Exception ) {
      throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    }
  }
?>