?php

include("db.php");

$mode=$_GET['mode'];

$sql="SELECT * FROM internship WHERE mode='$mode'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
    echo "<table>";
    echo "<tr>
            <th>Student Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Mode</th>
          </tr>";

    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['stud_name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['contact']."</td>";
        echo "<td>".$row['mode']."</td>";
        echo "</tr>";
    }

    echo "</table>";
}
else
{
    echo "No Records Found";
}

?>
