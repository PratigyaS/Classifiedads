<?php include 'menu.php';?>

<link rel = "stylesheet" type="text/css" href="Form.css">
<?php include 'connect.php';

  $sql = "SELECT * FROM ads";
$result = $db->query($sql);

//the function num_rows() checks if there are more than zero rows returned
if ($result->num_rows > 0) {
   echo "<table><tr><th>SELECT</th><th>ADID</th><th>ADName</th><th>ADCATEGORY</th><th>CONTACTNUMBER</th><th>EXPIRATIONDATE</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
echo "<td> 
        <input type='checkbox' name='checkbox[]' value=".$row['ADID']." > ".$row['ADID']."
    </td>";
echo "<td>" .$row["ADID"]. "</td>";
echo "<td>" .$row["ADNAME"]. "</td>";
echo "<td>" .$row["ADCATEGORY"]. "</td>";
echo "<td>" .$row["CONTACTNUMBER"]. "</td>";
echo "<td>" .$row["EXPIRATIONDATE"]. "</td>";
       // $myCheckVar = $_POST['checkbox[]'];echo "<img src=\"images/" . $row['filename'] . "\" alt=\"\" />
echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
          
           
        $result->free();
?>


      <form name='waz' action='deletead.php' method='post'>
        
      <input type="submit" value='Delete' name="Delete"/>
      </form>
      
    <input type="submit" value='Update' name="update"/>
    <input type="submit" value="New" name="new" onClick="window.location='post_ad.php';"/>
        
      
    