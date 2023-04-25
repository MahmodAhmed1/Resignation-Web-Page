
<?php
    if (isset($_POST['full_name']) && isset($_POST['user_name'])
        && isset($_POST['birthdate']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['password'])
        && isset($_FILES['image']['name']) && isset($_POST['email'])) {
        $full_name = $_POST["full_name"];
        $user_name = $_POST["user_name"];
        $email =  $_POST["email"];
        $birthdate = $_POST["birthdate"];
        $phone = $_POST["phone"];
        $img_name = $_FILES['image']['name'];
        $pass = $_POST["password"];
        $userAddress = $_POST["address"];
    };
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "User_db";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if database exists
    $result = mysqli_query($conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
    if (mysqli_num_rows($result) == 0) {
        // Create database
        $sql = "CREATE DATABASE $dbname";
        mysqli_query($conn, $sql);
    }
    // Select database
    mysqli_select_db($conn, $dbname);


    // Check if table exists
    $table_name = "users";
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$table_name'");
    if (mysqli_num_rows($result) == 0) {
        // Create table
        $sql = "CREATE TABLE $table_name (
            id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fullName VARCHAR(255),
            username VARCHAR(255) unique,
            email VARCHAR(255) unique,
            birthdate DATE,
            phone VARCHAR(255),
            photo VARCHAR(255),
            pass VARCHAR(255),
            useraddress VARCHAR(255)
        )";
        mysqli_query($conn, $sql);
    }

    // check username
    if(!empty($_POST["username"])){
        $m_sql = "SELECT * FROM users WHERE userName='" . $_POST["username"]."'";
        $result = mysqli_query($conn,$m_sql);
        $counter = mysqli_num_rows($result);
        if($counter>0){
            echo"<span style='color:red'> Username has already been taken .</span>";
            echo "<script>$('#submit-btn').prop('disabled',true);</script>;";
        }else{
            echo"<span style='color:green'> Username is vaild .</span>";
            echo "<script>$('#submit-btn').prop('disabled',false);</script>;";
        }
        
    }

    // check Email
    if(!empty($_POST["email"])){
        $m_sql = "SELECT * FROM users WHERE email='" . $_POST["email"]."'";
        $result = mysqli_query($conn,$m_sql);
        $counter = mysqli_num_rows($result);
        if($counter>0){
            echo"<span style='color:red'> This email is used before .</span>";
            echo "<script>$('#submit-btn').prop('disabled',true);</script>;";

        }else{
            echo"<span style='color:green'> Email is vaild .</span>";
            echo "<script>$('#submit-btn').prop('disabled',false);</script>;";
        }
    }
    include 'Upload.php';
    // Insert data into database
    $sql = "INSERT INTO users (fullName, username, email, birthdate, phone, photo, pass, useraddress )
    VALUES ('$full_name', '$user_name', '$email', '$birthdate', '$phone', '$img_name', '$pass', '$userAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>