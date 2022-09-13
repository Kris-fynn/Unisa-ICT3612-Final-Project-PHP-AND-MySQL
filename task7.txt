<!DOCTYPE html>
<head>
    <title>Assignment3</title>
</head>
<body>
    <?php include 'menu.inc'; 
        
        echo "<table style='width:100%'>
        <tr>
          <th>Website Url</th>
          <th>certification authorities</th> 
          <th>Expiry date</th>
          </tr>
          <tr>
            <td>https://medeberiyaa.com/</td>
            <td>Cloudflare Inc ECC CA-3</td>
            <td>‎Monday, ‎July ‎4, ‎2022 1:59:59 AM</td>
          </tr>
        <tr>
        <td>https://www.takealot.com/</td>
        <td>Go Daddy Secure Certificate Authority - G2</td>
        <td>‎Tuesday, ‎January ‎4, ‎2022 9:22:14 PM</td>
        </tr>
        <tr>
        <td>https://www.w3schools.com/</td>
        <td>DigiCert TLS RSA SHA256 2020 CA1</td>
        <td>‎Tuesday, ‎May ‎3, ‎2022 1:59:59 AM</td>
        </tr>
        <tr>
          <td>https://www.youtube.com/</td>
          <td>GTS CA 101</td>
          <td>‎Tuesday, ‎September ‎14, ‎2021 3:36:21 PM</td>
        </tr>
        <tr>
          <td>https://www.facebook.com/</td>
          <td> DigiCert SHA2 High Assurance Server CA</td>
          <td>‎Wednesday, ‎August ‎25, ‎2021 1:59:59 AM</td>
        </tr>
      </table>"
        // echo '<form action="task7.php" method="POST">
        //     <p><input type="text" name="filename">File name</p>
        //     <p><textarea name="paragraph_text" cols="50" rows="10"></textarea>Text to write to file</p>
        //     <p><input type="submit" name="submit"></p>
        // </form>';

        // $filenamename = '';
        // if(isset($_POST['submit'])){

        //     if (isset($_POST['filename']) && isset($_POST['paragraph_text'])) {
        //         $write =$_POST['paragraph_text'];
        //         $filename = $_POST['filename'];
        //         $filename = $filename.".txt";
        //         file_put_contents($filename,$write);
        //         $filenamename = $filename;
        //     }

        // }

        // //display contents of created file

        // echo "<form action='task7.php' method='POST'>
        //     <P> <input type='submit' name='displayContents'></p>
        // </form>";

        // if (isset($_POST['displayContents'])) {
            
        //     echo file_get_contents('dsf.txt');
        // }


    ?>
    <iframe src="task7.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>