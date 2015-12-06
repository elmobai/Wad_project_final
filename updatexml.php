<?php
/*
 * PHP SimpleXML
 * Loading a XML from a file, adding new elements and editing elements
 */



        //get author from form
$name = $_POST["name"];
$address = $_POST["address"];
$telephone = $_POST["telep"];


        if (file_exists('address.xml')) {
            //loads  xml and returns a simplexml object
            $xml = simplexml_load_file('address.xml');
            //adding new child to  address.xml
    $newChild = $xml->genre->addChild('person');
    $newChild->addChild('name', $name);
    $newChild->addChild('address', $address);
    $newChild->addChild('telephone', $telephone);
     

  
} else {
    exit('unable to open address.xml');
}

       
        file_put_contents('/home/ubuntu/workspace/address.xml', $xml->asXML());
        if(isset($_SERVER['HTTP_REFERER'])){
            header("Location: " . $_SERVER['HTTP_REFERER']);    
        } else {
            echo "An Error";
        }

?>