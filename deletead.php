<?php
include 'connect.php'; 

 if(isset($_POST['Delete'])){

    if(isset($_POST['ADID'])){
      foreach($_POST['ADID'] as $key=>$val){
       echo $val; //this will return all checked values
      }
    }

}
?>