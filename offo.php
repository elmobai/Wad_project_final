<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
    $drink = $_GET['drink'];
    $drinksArray = array('Sean','Curtis','Emlyn','Evan','Darren','Sam','Aaron','Jade','Caoimhe','Katie','Joe','Jane','egg','Francis');
    if(in_array($drink,$drinksArray))
        echo 'We found '.$drink.' in our directory';
    elseif($drink=='')
        echo 'Please enter a name';
    else
        echo 'Sorry we dont have '.$drink.' in our directory';
echo '</response>';
?>