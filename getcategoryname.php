<?php include = connect.php 
                
            $sql = "SELECT CatName FROM categories";
            $result = $db->query($sql);
            $options="";
        while($row = $result->fetch_assoc()) {
        $categoryname=$row["CatName"]; 
  echo '<option value=choose>Please select a category</option>';
            $options.="<OPTION VALUE=\"$id\">".$categoryname."</OPTION>"; 
}
?>
<?php
//put here initialization code ..........init.php something
echo '<option value=choose>Please select a member</option>';
$admin = $user->data() ->username;
$membername = DB::getInstance()->query("SELECT * FROM members WHERE admin_username = '{$admin}'");
    foreach($membername->results() as $result)
        echo '<option value="'. $result->member_id.'">' . $result->member_first_name . ' ' . $result->member_last_name . '</option>';
?>