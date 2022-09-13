<!DOCTYPE html>
<head>
    <title>Assignment3</title>
</head>
<body>
    <?php include 'menu.inc';

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=films", $username, $password);
$results = $conn->query('Select * from actors');
if(!$results){
    print "<p>Could not retrieve Actors list: " . $conn->errorMsg(). "</p>";
}
echo "<br/><b>Actor's table</b>:";
echo "<table style='width:100%'><tr><th>Actor id</th><th>Name</th><th>Notes</th></tr>";
while ($row = $results->fetch()) {
    
    echo "<tr>";
    echo "<td>".$row['ActorID']."</td>";
    echo "<td>".$row['ActorFullName']."</td>";
    echo "<td>".$row['ActorNotes']."</td>";
    echo "</tr>";
    echo "<br/>";
}

echo "</table>";
$conn = new PDO("mysql:host=$servername;dbname=films", $username, $password);
$results = $conn->query('Select * from roletypes');
echo "<br/><b>Roles table</b>:";
echo "<table style='width:100%'><tr><th>Type id</th><th>Type</th></tr>";
while ($row = $results->fetch()) {
    
    echo "<tr>";
    echo "<td>".$row['RoleTypeID']."</td>";
    echo "<td>".$row['RoleType']."</td>";
    echo "</tr>";
    echo "<br/>";
}

echo "</table>";

$conn = new PDO("mysql:host=$servername;dbname=films", $username, $password);
$results = $conn->query('Select * from FilmActorRoles');
echo "<br/><b>Film-Actor-Roles table</b>:";
echo "<table style='width:100%'><tr><th>Film Title id</th><th>Actor id</th><th>Role Type id</th><th>Charecter Name</th><th>Charecter Description</th></tr>";
while ($row = $results->fetch()) {
    
    echo "<tr>";
    echo "<td>".$row['FilmTitleID']."</td>";
    echo "<td>".$row['ActorID']."</td>";
    echo "<td>".$row['RoleTypeID']."</td>";
    echo "<td>".$row['CharecterName']."</td>";
    echo "<td>".$row['CharecterDescription']."</td>";
    echo "</tr>";
    echo "<br/>";
}

echo "</table>";

$conn = new PDO("mysql:host=$servername;dbname=films", $username, $password);
$results = $conn->query('Select * from FilmTitles');
echo "<br/><b>Film Titles Table</b>:";
echo "<table style='width:100%'><tr><th>Film Title ID</th><th>Film Title</th><th>Film Duration</th><th>Film Story</th></tr>";
while ($row = $results->fetch()) {
    
    echo "<tr>";
    echo "<td>".$row['FilmTitleID']."</td>";
    echo "<td>".$row['FilmTitle']."</td>";
    echo "<td>".$row['FilmDuration']."</td>";
    echo "<td>".$row['FilmStory']."</td>";
    echo "</tr>";
    echo "<br/>";
}

echo "</table>";

echo '<br/><form action="task6.php" method="POST">
<b>Choose Query clause:</b><br/>
        <p><input type="radio" name="query"
        value="order">Order By</p>
        <p><input type="radio" name="query"
        value="like">Like Operator</>
        <p><input type="radio" name="query"
        value="inner">Inner Join</p>
        <p><input type="radio" name="query"
        value="where">WHERE clause and AND operator</p>
        <p><input type="radio" name="query"
        value="avg">AVG function</p>
        
        <input type="submit" name="submit">
        </form>';
        
        if(isset($_POST['submit'])){
            if (isset($_POST['query'])) {
                $queryType = $_POST['query'];
                switch ($queryType) {
                    case 'order':
                        $results = $conn->query('Select * from Actors order by ActorFullName');
                        
                        echo "<br/><b>Actor's table</b>:";
                        echo "<table><tr><th>Actor id</th><th>Name</th><th>Notes</th></tr>";
                        while ($row = $results->fetch()) {
                            
                            echo "<tr>";
                            echo "<td>".$row['ActorID']."</td>";
                            echo "<td>".$row['ActorFullName']."</td>";
                            echo "<td>".$row['ActorNotes']."</td>";
                            echo "</tr>";
                            echo "<br/>";
                        }
                        
                        echo "</table>";
                        
                        break;
                        case 'like':
                            $results = $conn->query('Select * from Actors WHERE ActorFullName Like "%n"');
                            echo "<br/><b>Actors whose names end with an 'n'</b>:";
                            echo "<table><tr><th>Actor id</th><th>Name</th><th>Notes</th></tr>";
                            while ($row = $results->fetch()) {
                                
                                echo "<tr>";
                                echo "<td>".$row['ActorID']."</td>";
                                echo "<td>".$row['ActorFullName']."</td>";
                                echo "<td>".$row['ActorNotes']."</td>";
                                echo "</tr>";
                                echo "<br/>";
                            }
                            
                            echo "</table>";
                            
                            break;
                            case 'inner':
                                $results = $conn->query('SELECT a.ActorFullName,fa.CharecterName,ft.filmtitle
                                FROM actors a, filmactorroles fa, filmtitles ft
                                WHERE a.ActorID=fa.ActorID
                                AND fa.FilmTitleID=ft.FilmTitleID');
                                echo "<br/><b>Actors, their charecter and films</b>:";
                                echo "<table><tr><th>Actor Name</th><th>Charecter Name</th><th>Film name</th></tr>";
                                while ($row = $results->fetch()) {
                                    
                                    echo "<tr>";
                                    echo "<td>".$row['ActorFullName']."</td>";
                                    echo "<td>".$row['CharecterName']."</td>";
                                    echo "<td>".$row['filmtitle']."</td>";
                                    echo "</tr>";
                                    echo "<br/>";
                                }
                                
                                echo "</table>";
                                
                                break;
                                
                                case 'where':
                                $results = $conn->query('SELECT * FROM `actors` WHERE ActorFullName="Jonathan Davis"');
                                echo "<br/><b>Actor with the name 'Jonathan Davis'</b>:";
                                echo "<table><tr><th>Actor ID</th><th>Full name</th><th>Notes</th></tr>";
                                while ($row = $results->fetch()) {
                                    
                                    echo "<tr>";
                                    echo "<td>".$row['ActorID']."</td>";
                                    echo "<td>".$row['ActorFullName']."</td>";
                                    echo "<td>".$row['ActorNotes']."</td>";
                                    echo "</tr>";
                                    echo "<br/>";
                                }
                                
                                echo "</table>";
                                
                                default:
                                # code...
                                $results = $conn->query('SELECT SEC_TO_TIME(AVG(TIME_TO_SEC("FilmDuration"))) AS Average FROM filmtitles');
                                echo "<br/><b>Average seconds'</b>:";
                                echo "<table><tr><th>Average</th></tr>";
                                while ($row = $results->fetch()) {
                                    
                                    echo "<tr>";
                                    echo "<td>".$row['Average']."</td>";
                                    echo "</tr>";
                                    echo "<br/>";
                                }
                                
                                echo "</table>";
                            break;
                    }
                }else {
                    echo 'Select the type of query!!';
                }
            }
    ?>


    <iframe src="task6.txt" height="400" width="1200">
Your browser does not support iframes. </iframe>
</body>
</html>