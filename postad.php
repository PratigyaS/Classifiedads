    <?php include 'connect.php'?>
    
     
      
      <form method="post">
            
    <?php 
        
        if(isset($_POST['submit']))
            
        
        {
                     
            $adname=filter_input(INPUT_POST, 'adname');
            $adcategory=filter_input(INPUT_POST, 'adcategory');
            $contactnumber=filter_input(INPUT_POST, 'contactnumber');
            $description=filter_input(INPUT_POST, 'description');
            $image=filter_input(INPUT_POST, 'image');
            $expirationdate=filter_input(INPUT_POST, 'expirationdate');
    
   
         
       if(empty($adname)or empty($adcategory) or empty($contactnumber)or empty($description)or empty($expirationdate))
        {
        echo "Field is empty";
        }
        
        else{
            
             
            try{
              
                
 $insert= $db->query(" INSERT INTO ads (ADNAME,ADCATEGORY,CONTACTNUMBER,DESCRIPTION,IMAGE,EXPIRATIONDATE)VALUES('$adname','$adcategory','$contactnumber','$description','$image','$description')");
     
            }
     
          
             catch(Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
       
}
    }



?>

   
   