
<?php include 'connect.php';

  $sql = "SELECT * FROM categories";
$result = $db->query($sql);

//the function num_rows() checks if there are more than zero rows returned
if ($result->num_rows > 0) {
   echo "<table><tr><th>SELECT</th><th>CategoryId</th><th>CategoryName</th><th>CategoryImage</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
echo "<td> 
 <input type='checkbox' name='checkbox[]' value=".$row['CatId']." > ".$row['CatId']."
    </td>";
echo "<td>" .$row["CatId"]. "</td>";
echo "<td>" .$row["CatName"]. "</td>";
echo "<td>" .$row["CatImage"]. "</td>";

       // $myCheckVar = $_POST['checkbox[]'];
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
    <input type="submit" value="New" name="new" onClick="window.location='postad.html';"/>
        
      
    