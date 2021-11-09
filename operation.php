<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

//create button click

if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();
}

function createData(){
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice){
        $sql = "INSERT INTO books(book_name, book_publisher, book_price)
                VALUES('$bookname', '$bookpublisher','$bookprice')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("Success", "Record Successfully inserted...!");
            
        }else{
            echo "Error";
        }
    }else {
       TextNode("error", "Provide data in the text box");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}



//messages function
function TextNode($classname, $msg){
    $element="<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from mysql database

function getData(){
    $sql="SELECT*FROM books";

    $result = mysqli_query($GLOBALS['con'],$sql);

    if(mysqli_num_rows($result)>0){
        return $result;
    }

}


//update data
 function UpdateData(){
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice){
        $sql = "
            UPDATE books SET book_name = '$bookname', book_publisher='$bookpublisher', book_price = '$bookprice' WHERE id='$bookid';

        ";

        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success", "Data successfully updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }
    } else{
            TextNode("error", "Select data using edit icon"); 
    }

   
 }


 //Delete record

 function deleteRecord(){
     $bookid=(int)textboxValue("book_id");

     $sql = "DELETE FROM books WHERE id=$bookid";

     if(mysqli_query($GLOBALS['con'],$sql)){
         TextNode("success", "Record deleted successfully....!");
     }else{
         TextNode("error", "Unable to delete record");
     }

 }


 function deleteBtn(){
     $result=getData();
     $i=0;
     if($result){
         while ($row = mysqli_fetch_assoc($result)){
             $i++;

             if($i>3){
                 buttonElement("btn-deleteall", "btn-danger", "<i class='fas fa-trash'></i> Delete all", "deleteall","");
                 return;
             }
         }
     }
 }


 function deleteAll(){
     $sql = "DROP TABLE books";

     if(mysqli_query($GLOBALS['con'], $sql)){
         TextNode("success", "All Record deleted successfully..!");
         Createdb();

     }else{
         TextNode("error", "Something went wrong. Record cannot be deleted..!");
     }
 }