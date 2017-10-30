
<?php  
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "blog";
// echo'connected to '.$dbname;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$sql = "SELECT `Id`, `Heading`, `SubHeading`, `text`, `picture`, `caption`, `quote` FROM `post` order by 'Id' limit 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<article id=\'". $row["Id"]. "\'><header><H1>". $row["Heading"]. "</H1><H2>" . $row["SubHeading"] ."</H2><p>published <time>". $row["Id"]."</time></p></header><p>".$row["text"]."</p>";
        if ($row["quote"] !=NULL) {
        	echo "<q>".$row["quote"]."</q>";
        }


       echo" <figure><img src='". $row["picture"]."'><figcaption>". $row["caption"] . "</figcaption></figure></article>";
    }
} else {
    echo "0 results";
}

$conn->close();?>