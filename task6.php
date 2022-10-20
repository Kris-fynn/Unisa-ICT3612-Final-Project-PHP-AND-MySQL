<!DOCTYPE html>
<html>
<body>    
<main>
<h1>Task 6</h1>
<?php

//Setup DB Connection
$dsn = '';
$username = '';
$password = '';

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>An error occured while connecting to the database: $error_message </p>";
}

//Get all actors from database
$query = 'SELECT * FROM actors';
$statement = $db->prepare($query);
$statement->execute();
$actors = $statement->fetchAll();
$statement->closeCursor();

//Get all films from database
$query = 'SELECT * FROM film_titles';
$statement = $db->prepare($query);
$statement->execute();
$films = $statement->fetchAll();
$statement->closeCursor();

//Get all role types from database
$query = 'SELECT * FROM role_types';
$statement = $db->prepare($query);
$statement->execute();
$roles = $statement->fetchAll();
$statement->closeCursor();

//Get all film actor roles from database
$query = 'SELECT * FROM film_actor_roles';
$statement = $db->prepare($query);
$statement->execute();
$film_actor_roles = $statement->fetchAll();
$statement->closeCursor();

?>



<!--display actors in HTML table-->
<h3>Actors:</h3>
<table style="border: 1px solid black;">
<tr>
    <th>ActorID</th>
    <th>ActorFullName</th>
    <th>ActorNotes</th>
</tr>

<?php foreach ($actors as $actor) : ?>
<tr>
    <td><?php echo $actor['ActorID']; ?> </td>
    <td><?php echo $actor['ActorFullName']; ?> </td>
    <td><?php echo $actor['ActorNotes']; ?> </td>
</tr>
<?php endforeach; ?>
</table>

<br>
<hr>

<!--display films in HTML table-->

<h3>Films:</h3>
<table style="border: 1px solid black;">
<tr>
    <th>FilmTitleID</th>
    <th>FilmTitle</th>
    <th>FilmDuration</th>
    <th>FilmStory</th>
</tr>

<?php foreach ($films as $film) : ?>
<tr>
    <td><?php echo $film['FilmTitleID']; ?> </td>
    <td><?php echo $film['FilmTitle']; ?> </td>
    <td><?php echo $film['FilmDuration']; ?> </td>
    <td><?php echo $film['FilmStory']; ?> </td>
</tr>
<?php endforeach; ?>
</table>

<br>
<hr>

<!--display roles in HTML table-->
<h3>Roles:</h3>
<table style="border: 1px solid black;">
<tr>
    <th>RoleTypeID</th>
    <th>RoleType</th>
</tr>

<?php foreach ($roles as $role) : ?>
<tr>
    <td><?php echo $role['RoleTypeID']; ?> </td>
    <td><?php echo $role['RoleType']; ?> </td>
</tr>
<?php endforeach; ?>
</table>

<br>
<hr>

<!--display film actor roles in HTML table-->

<h3>Film Actor Roles:</h3>
<table style="border: 1px solid black;">
<tr>
    <th>FilmTitleID</th>
    <th>ActorID</th>
    <th>RoleTypeID</th>
    <th>CharacterName</th>
    <th>CharacterDescription</th>
</tr>

<?php foreach ($film_actor_roles as $film_actor_role) : ?>
<tr>
    <td><?php echo $film_actor_role['FilmTitleID']; ?> </td>
    <td><?php echo $film_actor_role['ActorID']; ?> </td>
    <td><?php echo $film_actor_role['RoleTypeID']; ?> </td>
    <td><?php echo $film_actor_role['CharacterName']; ?> </td>
    <td><?php echo $film_actor_role['CharacterDescription']; ?> </td>
</tr>
<?php endforeach; ?>
</table>

<br>
<hr>

<form action="" method="post">
    <input type="radio" name="query" value="orderBy">Select ActorFullName (Order by ActorFullName asc)<br>
    <input type="radio" name="query" value="like">Select CharacterName (CharacterName like 'Harry')<br>
    <input type="radio" name="query" value="innerJoin">Select CharacterName and Film Title (Inner Join film_titles on film_actor_roles)<br>
    <input type="radio" name="query" value="where">Select CharacterName (WHERE ActorID=5 OR RoleTypeID=5)<br>
    <input type="radio" name="query" value="max">Select MAX(FilmDuration) as MAX_Duration<br><br>
    <button type="submit">Show Query Results</button>
</form>

<br>
<hr>

<!-- first SQL query-->
<?php
    $SQL_query = filter_input(INPUT_POST, 'query');

    switch($SQL_query) {
        case 'orderBy' :
            $query = 'SELECT ActorFullName FROM actors ORDER BY ActorFullName asc';
            $statement = $db->prepare($query);
            $statement->execute();
            $actors = $statement->fetchAll();
            $statement->closeCursor(); 

            foreach ($actors as $actor) {
            echo
            "<tr>" .
                "<td>" . $actor['ActorFullName'] . "</td>" . "<br>" .
            "</tr>";
            }
        break;

        case 'like' : 
            $query = "SELECT CharacterName FROM film_actor_roles WHERE CharacterName like '%Harry%' ";
            $statement = $db->prepare($query);
            $statement->execute();
            $characters = $statement->fetchAll();
            $statement->closeCursor(); 

            foreach ($characters as $character) {
            echo
            "<tr>" .
                "<td>" . $character['CharacterName'] . "</td>" . "<br>" .
            "</tr>";
            }
        break;

        case 'innerJoin' : 
            $query = "SELECT film_actor_roles.CharacterName, film_titles.FilmTitle FROM film_actor_roles 
            INNER JOIN film_titles on film_titles.FilmTitleID = film_actor_roles.FilmTitleID";
            $statement = $db->prepare($query);
            $statement->execute();
            $filmCharacters = $statement->fetchAll();
            $statement->closeCursor(); 

            foreach ($filmCharacters as $filmCharacter) {
            echo
            "<tr>" .
                "<td>" . $filmCharacter['FilmTitle'] . "</td>" . "-" .
                "<td>" . $filmCharacter['CharacterName'] . "</td>" . "<br>" .
            "</tr>";
            }
        break;

        case 'where' : 
            $query = "SELECT CharacterName FROM film_actor_roles WHERE ActorID='5' OR RoleTypeID='5' ";
            $statement = $db->prepare($query);
            $statement->execute();
            $characters = $statement->fetchAll();
            $statement->closeCursor(); 

            foreach ($characters as $character) {
            echo
            "<tr>" .
                "<td>" . $character['CharacterName'] . "</td>" . "<br>" .
            "</tr>";
            }
        break;

        case 'max' : 
            $query = "SELECT max(FilmDuration) as MaxDuration FROM film_titles";
            $statement = $db->prepare($query);
            $statement->execute();
            $maxDuration = $statement->fetch();
            $statement->closeCursor(); 

            echo "Maximum movie duration: " . $maxDuration['MaxDuration'] . " minutes";
            break;
}

?>

</main>
</body>
</html>




