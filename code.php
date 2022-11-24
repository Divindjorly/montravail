<?php
session_start();
require 'config.php';


if(isset($_POST['delete-user']))
{
    $id = $_POST['delete-user'];

    $query = "DELETE FROM users WHERE id='$id'";
    $query_run = $conn->query($query);

    if($query_run)
    {
        $_SESSION['message']="user est supprimé ";
        header("Location: table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="user n'est pas supprimé";
        header("Location: table.php");
        exit(0);
    }
    
}




if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $code = $_POST['code'];
    

    $query="UPDATE users SET  name='$name' , email='$email' , phone='$phone', adress='$adress' , code='$code'
             WHERE id=$id  ";
    $query_run = $conn->query($query);

    if($query_run)
    {
        $_SESSION['message']="users mise a jour ";
        header("Location: table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="users n'est pas mise a jour";
        header("Location: table.php");
        exit(0);
    }
}

if(isset($_POST['ajouter'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $code = $_POST['code'];

    $query = "INSERT INTO users (name,email,phone,adress,code) VALUES 
    ('$name','$email','$phone','$adress','$code')";
    $query_run = $conn->query($query);
    if($query_run)
    {
        $_SESSION['message']="rendez-vous enregistré";
        header("Location: identification.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="rendez-vous non enregistré";
        header("Location: identification.php");
        exit(0);
    }

}


if(isset($_POST['submit'])) {
    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
    }
    if(isset($_POST['code']))
    {
        $code = $_POST['code'];
    }

    $select = "SELECT * FROM users WHERE email = '$email' AND code = '$code'";
    $result = $conn->query($select);
    $query_count = "SELECT COUNT(*) FROM users WHERE email = '$email' AND code = '$code'";
    $res = $conn->query($query_count);
    $count = $res->fetchColumn();
    if($count != 0){ 
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $id= $row['id'];
        $select1 = "SELECT * FROM admin WHERE id_client =$id "; 
        $result1 = $conn->query($select1);
        
        $query_count2 = "SELECT COUNT(*) FROM admin WHERE id_client =$id";
        $res2 = $conn->query($query_count2);
        $count2 = $res2->fetchColumn();
        
        if($count2 != 0){
            header('location: table.php');
        }else {
            header('location: account.php?id='.$row['id']);
        }
    }else {
        $error[] = 'Password or email incorrect';
    }

}


if(isset($_POST['recup_submit'])) {
    
    if(isset($_POST['recup_mail'])) {

        $recup_mail = $_POST['recup_mail'];

        if(!empty($_POST['recup_mail'])){
            $mail = $_POST['recup_mail'];
              if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
                  $mailexist = $conn->prepare('SELECT * FROM users WHERE email = ?');
                  $mailexist->execute(array($recup_mail));
                  $mailexist = $mailexist->rowCount();
                    if($mailexist == 1) {
                            $_SESSION['recup_mail'] = $recup_mail;
                            $recup_code = "";
                            for ($i=0; $i < 8; $i++) {
                                $recup_code .= mt_rand(0,9);
                            }
                            $mail_recup_exist = $conn->prepare('SELECT * FROM users WHERE email = ?');
                            $mail_recup_exist->execute(array($recup_mail));
                            $mail_recup_exist = $mail_recup_exist->rowCount();

                            if($mail_recup_exist == 1) {
                                $recup_insert = $conn->prepare('UPDATE users SET code = ? WHERE email = ?');
                                $recup_insert->execute(array($recup_code,$recup_mail));

                            }else {
                                   
                                $recup_insert = $conn->prepare('INSERT INTO recuperation(email,code) VALUES (?, ?)');
                                $recup_insert->execute(array($recup_mail,$recup_code));
                            }
                        header("location: sendmail.php");
                    } else {
                        $error[] = "Cette adresse mail n'est pas enregistrée";
                    }
              }  
              else {
                  $error[] = "Adresse mail invalide";
              }
              

        } else {
            $error[] = "Veuillez entrer votre adresse mail";
        }
    }

}

?>