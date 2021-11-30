<?php

require('article_class.php');

// retrieve data using the REST API
$news_data = file_get_contents("http://newsapi.org/v2/top-headlines?country=us&apiKey=0694092bb933442e861b65b330f6a1a9");

// deconding the json structure into a PHP object
// to access the data you have to use the -> notation
// $data = json_decode($jsonAsteroids);

// decoding the json structure into an array
// to access the data you have to use the [] notation
$data = json_decode($news_data, true);

// array that will store all the articles retrieved from the API
$all_articles = [];

for($i=0; $i<sizeof($data["articles"]); $i++){
    
    // creating an article object
    $article = new Article($data["articles"][$i]["source"]["name"],
    $data["articles"][$i]["author"],
    $data["articles"][$i]["title"],
    $data["articles"][$i]["description"]);
    
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
