<?php 
  if( !isset($_SESSION) ){ session_start(); }
  include ('connection.php');

  $email_count = 0;

  $name_contact     = trim( $_POST["name__contact"] );
  $email_contact    = trim( $_POST["email__contact"] );
  $address_contact  = trim( $_POST["address__contact"] );
  $phone_contact    = trim( $_POST["phone__contact"] );
  $phones           = $_POST["phone"] ;

  $cd_user          = $_SESSION["user"]["id"];
  $cd_contact       = $_POST["contact"];

  if (!$conn) {
    echo 'Sorry, the system is temporarily out of service, please try again later.';
  }else{

    try{
      $sql = $conn->prepare("
        SELECT ds_email
        FROM tb_contact
        WHERE ic_active = 1
        AND cd_contact <> :cd_contact;
      ");

      $sql->bindValue( ':cd_contact', $cd_contact );
      $sql->execute();
      $emails = $sql->fetchAll();

    }catch(PDOException $Exception ) {
      throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    }

    foreach ($emails as $email) {
      if( $email["ds_email"] == $email_contact ){
        $email_count = 1;
      }
    }

    if( $email_count == 1 ){
      echo "Sorry, contact email has already been registered.";
    }else{
      try{
        $sqlUpdate = $conn->prepare("
          UPDATE tb_contact 
          SET nm_contact = :name, ds_email = :email, ds_address = :address
          WHERE cd_contact = :cd_contact;
        ");
        $sqlUpdate->bindValue( ':name', $name_contact );
        $sqlUpdate->bindValue( ':email', $email_contact );
        $sqlUpdate->bindValue( ':address', $address_contact );
        $sqlUpdate->bindValue( ':cd_contact', $cd_contact );
        $sqlUpdate->execute();

      }catch(PDOException $Exception ) {
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
      }

      try{
        $sqlDelet = $conn->prepare("
          DELETE FROM tb_telephone WHERE cd_contact = :cd_contact;
        ");
        $sqlDelet->bindValue( ':cd_contact', $cd_contact );
        $sqlDelet->execute();

      }catch(PDOException $Exception ) {
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
      }

      try{
        $sqlInsertPhone = $conn->prepare("
          INSERT INTO tb_telephone (ds_telephone, cd_contact) 
          VALUES (:phone, :cd_contact);
        ");
        $sqlInsertPhone->bindValue( ':phone', $phone_contact );
        $sqlInsertPhone->bindValue( ':cd_contact', $cd_contact );
        $sqlInsertPhone->execute();

      }catch(PDOException $Exception ) {
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
      }

      foreach ( $phones as $phone ) {
        if($phone != ""){

          try{
            $sqlInsertPhoneAll = $conn->prepare("
              INSERT INTO tb_telephone (ds_telephone, cd_contact) 
              VALUES (:phone, :cd_contact);
            ");
            $sqlInsertPhoneAll->bindValue( ':phone', $phone );
            $sqlInsertPhoneAll->bindValue( ':cd_contact', $cd_contact );
            $sqlInsertPhoneAll->execute();

          }catch(PDOException $Exception ) {
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
          }

        }
      }

      echo "true";

    }
  }
?>