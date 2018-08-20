<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("202.66.172.231:3306", "uvauser", "Instant@123", "uvalocal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
 
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM packagetags WHERE searchtags LIKE '%" . $term . "%' OR packagetitle LIKE '%" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                
                ?>
<a align="center" style=" color:black;" href="detailpage.php?link=<?php echo $row['webpackageid'] ?>"> <p>  <?php echo $row['packagetitle'] ?></p></a>
                   <?php
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// close connection
mysqli_close($link);
?>