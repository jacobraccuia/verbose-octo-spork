<?php


class Article {

    // two examples: Date and camera
    private $date;
    private $camera;

  
    // constructor
    function __construct( $date, $camera) {

        $this->date = $date;
        $this->camera = $camera;

    
    }
    

    // methods

    // method that prints all the information related to an article
    function print_photos(){
        echo "Source name: " . $this->date . "<br>";
        echo "Camera: " . $this->camera . "<br>";
    }

      
}

?>
