<?php 

  include ('connection.php');
  
  $name_user      = trim($_POST["name_sign_up"]);
  $email_user     = trim($_POST["email_sign_up"]);
  $password_user  = md5( trim($_POST["password_sign_up"]) );

  if($name_user == '' || $email_user == '' || $password_user == '') {
    echo 'Has some blank field.';
  } else {

    if (!$conn) {
      echo 'Sorry, the system is temporarily out of service, please try again later.';
    }else{

      try{
        $sql = $conn->prepare("
          SELECT *
          FROM tb_user
          WHERE ds_email = :email
          AND ic_active = 1");
        $sql->bindValue(':email', $email_user);

        $sql->execute();
        $existEmail = $sql->fetchAll();
        $cod = $existEmail[0]['cd_user'];

      }catch(PDOException $Exception ) {
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
      }

      if($cod >= 1){
        echo "There is already a user with this email.";
      }else{

        try{
          $sqlInsert = $conn->prepare("
            INSERT INTO tb_user (nm_user, ds_user, ds_email, ds_password, ic_active) 
            VALUES (:name, 1, :email, :password, 1);
          ");
          $sqlInsert->bindValue( ':name', $name_user );
          $sqlInsert->bindValue( ':email', $email_user );
          $sqlInsert->bindValue( ':password', $password_user );
          $sqlInsert->execute();

        }catch(PDOException $Exception ) {
          throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }


        echo "true";
          
      };
    };
  }; 
?>