<!DOCTYPE html>
<head>

    <title>Assignment3</title>
    
</head>
<body>
    <?php include 'menu.inc'; 
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        $conn = new PDO("mysql:host=$servername;dbname=food_parcel", $username, $password);

        echo "The solution I am proposing is an online food parcel application system";
        echo '<form action="task9.php" method="POST">
            <p><input type="text" name="name" required>Your name</p>
            <p><input type="text" name="address" required>Your Address</p>
            <p><input type="email" name="email" required>Your Email</p>
            <p><textarea name="paragraph_text" cols="50" rows="10" required></textarea>Food assistance Request</p>
            <p><input type="submit" name="submit"></p>
        </form>';

        $filenamename = '';
        if(isset($_POST['submit'])){

            if (isset($_POST['filename']) && isset($_POST['paragraph_text']) && isset($_POST['address']) && isset($_POST['email'])) {
                $write =$_POST['paragraph_text'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                
             $sqlQuery="INSERT INTO applicant('name','address','email') VALUES($name,$address,$email)";
             $result = $conn->query($sqlQuery);
             $lastID =$conn->lastInsertId();
             $sqlQuery="INSERT INTO applicantion('applicant_ID','request') VALUES($lastID,$write)";

            }

        }

        //display contents of created file



    ?>
    <iframe src="task9.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>