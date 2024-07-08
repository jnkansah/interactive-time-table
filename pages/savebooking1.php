<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
  
$time_id = $_SESSION["time_id"];
$room = isset($_POST["room"]);
$name = $_POST["name"];
$class = $_POST["class"];

        $conn = mysqli_connect("localhost", "root", "", "scheduling");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        $sql = "INSERT INTO roombookingsched VALUES ('0','$name', 
            '$class','$room','$time_id')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully.</h3>"; 

        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>