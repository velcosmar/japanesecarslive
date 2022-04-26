<?php
include 'database.php';
session_start();

if( isset( $_POST['send'] ) ){

    $user = $_SESSION["user"];
    $question = $_POST["question"];
    if(empty($question)){
        header("Location:../contact.php?FieldEmpty");
        exit();
    }else $sql = mysqli_query($conn,"INSERT INTO questions(username, question,answer) VALUES('$user','$question','')");

    if($sql){
        header("Location:../contact.php?QuestionSent");
        exit();
    }else{

        header("Location:../contact.php?SQLerror");
        exit();
    }
    header("Location:../contact.php?WTF");
    exit();

}
if( isset($_POST['go'])){
    $ans = $_POST["answ"];
    $q = $_POST["ques"];
    $sql = mysqli_query($conn,"UPDATE questions SET answer = '$ans' WHERE question = '$q'");

    if($sql){
        header("Location:../contact.php?AnswerSet");
        exit();
    }else{
        header("Location:../contact.php?SQLerror");
        exit();
    }
}