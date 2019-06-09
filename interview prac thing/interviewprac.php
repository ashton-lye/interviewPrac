<!--interview practice thingy-->
<html>
    <body>

        <h1>Search Thingy</h1>
        <form action="interviewprac.php" method="post"> 
            <input type="text" id="searchBox" placeholder="Enter Search Term" name="searchBox">
            <input type="submit">
        </form>

    </body>
</html>

<?php

    //db connection
    try{
        $con = new PDO('mysql:host=localhost;dbname=hcl_mentors','root','root');
    } catch (PDOException $e) {
        echo "Database connection error " . $e->getMessage();
    }

    //receive search term
    $searchTerm = $_POST['searchBox'];

    //generate query
    $query = "SELECT username FROM mentors WHERE username LIKE '%$searchTerm%'";

    $result = $con->query($query);

    //display results
    while ($row = $result->fetch()) {
        echo $row['username']."<br>";
    }

?>