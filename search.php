<?php

require('search_api.php');
$search = new Search();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NASA API Search</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="/style.css" />

    <!-- import the webpage's javascript file -->
    <script src="/script.js" defer></script>

    <style>
        body { padding:30px; text-align:center; }
        em { color:grey; display:block; padding:5px; }
        form { padding:0 0 20px; }
        .error { color:red; }

        .photo { padding:15px; }
        .photo img { max-height:300px; width:100%; height:100%; object-fit:contain; }
    </style>
</head>
<body>
    <h1>
        NASA Mars Rover API Image Search
    </h1>
    <form action="" method="GET">
        <em>Please enter a date in YYYY-MM-DD format</em>
        <input id="searchTerm" name="search" type="text" placeholder="YYYY-MM-DD" value="<?php if(!empty($_GET['search'])) { echo $_GET['search']; } ?>"/>
        <button id="search">
            Search
        </button>
    </form>
    <div id="content">
        <?php
        echo $search->get_search_results();
        ?>
    </div>
</body>
</html
