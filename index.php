<?php

print '<pre>';
print_r($_POST);
print '</pre>';

require 'config/settings.php';
require 'lib/utilities.php';

// Chargement automatique des classes
spl_autoload_register('autoloader');

// Instancier les véhicules
$car = new Car();
$truck = new Truck();
if (empty($_POST)) {
    $car->reset();
    $truck->reset();
    $vitesse = rand(1, 13)*10;
}else {
    if(isset($_POST["vehicule"])){
        $selVehicule = securisation($_POST["vehicule"]);  
    }
    if(isset($_POST["speed"])){
        $speed = intval(securisation($_POST["speed"]));
    }
    if(isset($_POST["color"])){
        $cssColor = securisation($_POST["color"]);
        
    }
    if($_POST["action"]=="color"){
        if($selVehicule == "truck"){
            $truck->setColor($cssColor);
        }
        if($selVehicule == "car"){
            $car->setColor($cssColor);
        }
    }
    if($_POST["action"]==="drive"){
        if($_POST["vehicule"]==="car"){
            $car->drive($speed);
        }else if($_POST["vehicule"] === "truck"){
            $truck->drive($speed);
        }
    }
    if($_POST["action"]=="reset"){
        $car->reset();
        $truck->reset();
    }
    var_dump($_POST["action"]);
    var_dump($_POST["vehicule"]);
}
require 'views/index.html.php';

?>