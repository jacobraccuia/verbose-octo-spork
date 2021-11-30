<?php

/*
    class that helps to describe a article from the API: http://newsapi.org/

*/

class Article {

    // properties/fields. Other fields might be included, depending on the requirements of the project
    private $source_name;
    private $author;
    private $title;
    private $description;
  
    // constructor
    function __construct( $source_name, $author, $title, $description ) {

        $this->source_name = $source_name;
        $this->author = $author;
        $this->title = $title;
        $this->description = $description;
    
    }
    

    // methods

    // method that prints all the information related to an article
    function print_article_info(){
        echo "Source name: " . $this->source_name . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Title: " . $this->title . "<br>";
        echo "Description: " . $this->description . "<br>";
    }

      
}

?>
