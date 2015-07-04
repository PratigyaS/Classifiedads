<?php include 'connect.php'; 
                
            $sql = "SELECT CatName FROM categories order by CatName";
            $result = $db->query($sql);
           // $options="";
//echo "<select value='categories'>";       
while($row = $result->fetch_array()) {
           
        $categoryname=$row['CatName']; 
        //echo "$categoryname\n";
       //$options= '<option value="'.$categoryname.'">'.$categoryname.'</option>'; 
       // echo "$options\n";
    // echo '<option value="'.$categoryname.'">'.$categoryname.'</option>';
   
}
// echo "</select>";
?>          