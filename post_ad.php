
<?php include 'menu.php '?>
<?php 

session_start();
include 'connect.php'; 

function is_valid_type($file)

{

    // This is an array that holds all the valid image MIME types

    $valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif");

    if (in_array($file['type'], $valid_types))

        return 1;

    return 0;

}

function showContents($array)

{

    echo "<pre>";

    print_r($array);

    echo "</pre>";

}




?>
                
            

<html>
       <head>   
           <title>Post AD</title>
           <link rel = "stylesheet" type="text/css" href="Form.css">
    </head>
  <body>
      
      <?php

                if (isset($_SESSION['error']))

                {

                    echo "<span id=\"error\"><p>" . $_SESSION['error'] . "</p></span>";

                    unset($_SESSION['error']);

                }

                ?>

      
      <form method="POST" action="" enctype="multipart/form-data">
          
     <table align="center" style="margin: 0px auto;">
    <tr>
    <td>AdName:</td>
    <td><input type="text" name="adname"></td>
     </tr>
     <tr>
    <td>AdCategory</td>
         <td>
            
             <?php $sql = "SELECT CatName FROM categories order by CatName";
            $result = $db->query($sql);
           // $options="";
            echo "<select name= 'adcategory' value='adcategory'>";       
            while($row = $result->fetch_array()) {
           
        $categoryname=$row['CatName']; 
        //echo "$categoryname\n";
       //$options= '<option value="'.$categoryname.'">'.$categoryname.'</option>'; 
       // echo "$options\n";
    echo '<option value="'.$categoryname.'">'.$categoryname.'</option>';
   
}
echo "</select>";
echo "<input type=\"hidden\" name=\"submitted\" value=\"TRUE\" />";
?>          
  </td>
     </tr>
     <tr>
    <td>Contact Number</td>
    <td><input type="text" name="contactnumber"></td>
     </tr>
     <tr>
    <td>Image</td>
    <td><input type="file" name="image" /><br />

                    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />

                    
</td>
     </tr>
     <tr>
    <td>Description</td>
    <td><input type="text" name="description"></td>
     </tr>
        <tr>
    <td>Expiration Date</td>
    <td><input type="text" name="expirationdate"></td>
     </tr>
     <tr>
     <td id="btn"><input type="submit" value='submit' name="submit"></td>
    </tr>    
    </table>
        
    <?php 
        



        if(isset($_POST['submit']))
            
        
        {
            
            $image = $_FILES['image'];
            
             $TARGET_PATH = "images/"; 
            
            $adname=filter_input(INPUT_POST, 'adname');
            $adcategory=filter_input(INPUT_POST, 'adcategory');
            $contactnumber=filter_input(INPUT_POST, 'contactnumber');
            $description=filter_input(INPUT_POST, 'description');
            
            $image['name'] = mysql_real_escape_string($image['name']);
            $expirationdate=filter_input(INPUT_POST, 'expirationdate');
    
   $TARGET_PATH .= $image['name'];

        
       if(empty($adname)or empty($adcategory) or empty($contactnumber)or empty($description)or empty($expirationdate))
        {
        $_SESSION['error'] = "All fields are required";

        header("Location: index.php");

        exit;
        }
        if (!is_valid_type($image))

{

    $_SESSION['error'] = "You must upload a jpeg, gif, or bmp";

    header("Location: index.php");

    exit;

}

if (file_exists($TARGET_PATH))

{

    $_SESSION['error'] = "A file with that name already exists";

    header("Location: index.php");

    exit;

}

       if (move_uploaded_file($image['tmp_name'], $TARGET_PATH))

{
            
             
            try{
              
                
 $insert= $db->query(" INSERT INTO ads (ADNAME,ADCATEGORY,CONTACTNUMBER,DESCRIPTION,IMAGE,EXPIRATIONDATE)VALUES('$adname','$adcategory','$contactnumber','$description','". $image['name'] ."','$description')");
                
                header("Location: adlist.php");

    exit;

     
            }
     
          
             catch(Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
       
}
            
            
            else

{

    

    $_SESSION['error'] = "Could not upload file.  Check read/write persmissions on the directory";

    header("Location: index.php");

    exit;

}

            
    }



?>

    </form>
      </body>
</html>

