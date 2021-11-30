<?php

require('Mars3.php');

// retrieve data using the NASA REST API
$mars_rover_photos = file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?&api_key=HHurvDsAdqFckh5IH5bqSbtK5Z1KkNXGcAbWRYgb");

// deconding the json structure into a PHP object
// to access the data you have to use the -> notation
// $data = json_decode($jsonAsteroids);

// decoding the json structure into an array
// to access the data you have to use the [] notation
$data = json_decode($mars_rover_photos, true);

// array that will store all the articles retrieved from the API
$all_articles = [];

for($i=0; $i<sizeof($data["photos"]); $i++){
    
    // creating an article object
    $article = new Article($data["photos"][$i]["date"],
    $data["photos"][$i]["camera"]);
    
    array_push( $all_articles, $article );
    
}

// to display all the objects in the array we are going to use a loop
echo "<h4>Printing all the articles retrieved from the API into separate paragraphs</h4>";
for( $i=0; $i<sizeof($all_articles); $i++ ){
    $counter = $i + 1;
    echo "<p><h4>Article $counter </h4>";
    $all_articles[$i]->print_article_info();
    echo "</p>";
}


?>
