<?php 

  include ('connection.php');
  
  $email    = trim($_POST['email']);
  $password = md5( trim( $_POST['password'] ) );

  if($email == '' || $password == '') {
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
        $sql->bindValue(':email',$email);

        $sql->execute();
        $existEmail = $sql->fetchAll();
        $cod = $existEmail[0]['cd_user'];

      }catch(PDOException $Exception ) {
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
      }

      if($cod <= 0){
        echo "Email not registered.";
      }else{

        try{
          $sql = $conn->prepare("
            SELECT *
            FROM tb_user
            WHERE ds_email = :email 
            AND ds_password = :password 
            AND ic_active = 1;");

          $sql->bindValue(':email', $email);
          $sql->bindValue(':password', $password);

          $sql->execute();
          $existUser = $sql->fetchAll();

        }catch(PDOException $Exception ) {
          throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }

        if ( $existUser[0]['cd_user'] <= 0 ) {
          echo "Incorrect password.";      
        }else{

          if( !isset($_SESSION) ){ session_start(); }

          $_SESSION['user']['id']     = $existUser[0]['cd_user'];
          $_SESSION['user']['name']   = $existUser[0]['nm_user'];
          $_SESSION['user']['type']   = $existUser[0]['ds_user'];
          $_SESSION['user']['email']  = $existUser[0]['ds_email'];

          echo "true";
          
        };
      };
    };
  }; 
?>