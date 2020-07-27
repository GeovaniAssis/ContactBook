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
  
  if (!$conn) {
    echo 'Sorry, the system is temporarily out of service, please try again later.';
  }else{

    try{
      $sql = $conn->prepare("
        SELECT ds_email
        FROM tb_contact
        WHERE ic_active = 1;
      ");

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
        $sqlInsert = $conn->prepare("
          INSERT INTO tb_contact (nm_contact, ds_email, ds_address, ic_active, cd_user) 
          VALUES (:name, :email, :address, 1, :user);
        ");
        $sqlInsert->bindValue( ':name', $name_contact );
        $sqlInsert->bindValue( ':email', $email_contact );
        $sqlInsert->bindValue( ':address', $address_contact );
        $sqlInsert->bindValue(':user', $cd_user);
        $sqlInsert->execute();

      }catch(PDOException $Exception ) {
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
      }

      try{
        $sqlSearch = $conn->prepare("
          SELECT cd_contact
          FROM tb_contact
          WHERE ds_email = :email;
        ");
        $sqlSearch->bindValue( ':email', $email_contact );

        $sqlSearch->execute();
        $cd_new_contact = $sqlSearch->fetchAll();

      }catch(PDOException $Exception ) {
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
      }

      try{
        $sqlInsertPhone = $conn->prepare("
          INSERT INTO tb_telephone (ds_telephone, cd_contact) 
          VALUES (:phone, :cd_contact);
        ");
        $sqlInsertPhone->bindValue( ':phone', $phone_contact );
        $sqlInsertPhone->bindValue( ':cd_contact', $cd_new_contact[0]['cd_contact'] );
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
            $sqlInsertPhoneAll->bindValue( ':cd_contact', $cd_new_contact[0]['cd_contact'] );
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