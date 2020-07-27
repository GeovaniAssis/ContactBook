<?php 
  if( !isset($_SESSION) ){ session_start(); }
  include ('connection.php');
  if (!$conn) {
    echo 'Sorry, the system is temporarily out of service, please try again later.';
  }else{
    try{
      $sql = $conn->prepare("
        SELECT *
        FROM tb_contact
        WHERE cd_contact = :cd_contact
        AND ic_active = 1
        AND cd_user = :cd_user;");

      $sql->bindValue(':cd_contact', $edit_contact);
      $sql->bindValue(':cd_user', $_SESSION["user"]["id"]);

      $sql->execute();
      $contact = $sql->fetchAll();

    }catch(PDOException $Exception ) {
      throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    }

    try{
      $sql = $conn->prepare("
        SELECT *
        FROM tb_telephone
        WHERE cd_contact = :cd_contact;
      ");

      $sql->bindValue(':cd_contact', $edit_contact);
      $sql->execute();
      $telephones = $sql->fetchAll();

    }catch(PDOException $Exception ) {
      throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    }

  }
?>