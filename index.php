<?php



require 'config/settings.php';
require 'lib/utilities.php';

// Chargement automatique des classes
spl_autoload_register('autoloader');

// Initialisation des variables
$selVehicule = '';
$color = '';
// Instanciation de la classe Car
$car = new Car();
// Instanciation de la classe Truck
$truck = new Truck;

if (empty($_POST)) {
  // Initialisation des propriétés de la voiture
  $car->reset();
  // Initialisation des propriétés du camion
  $truck->reset();
  // Initialisation de la vitesse par défaut
  $speed = rand(1, 13) * 10;
  // Stockage des valeurs d'initialisation dans les cookies
  setcookie('carcolor', $car->getColor());
  setcookie('carposition', $car->getPosition());
  setcookie('cardriver', $car->getDriver());
  setcookie('carpassengers', $car->getPassengers());
  setcookie('truckcolor', $truck->getColor());
  setcookie('truckposition', $truck->getPosition());
  setcookie('truckdriver', $truck->getDriver());
  setcookie('truckloading', $truck->getLoading());
}
else {
  // Récupérer les cookies
  if (!empty($_COOKIE)) {
    if (isset($_COOKIE['carcolor'])) {
      $car->setColor($_COOKIE['carcolor']);
    }
    if (isset($_COOKIE['carposition'])) {
      $car->setPosition($_COOKIE['carposition']);
    }
    if (isset($_COOKIE['cardriver'])) {
      $car->setDriver($_COOKIE['cardriver']);
    }
    if (isset($_COOKIE['carpassengers'])) {
      $car->setPassengers($_COOKIE['carpassengers']);
    }
    if (isset($_COOKIE['truckcolor'])) {
      $truck->setColor($_COOKIE['truckcolor']);
    }
    if (isset($_COOKIE['truckposition'])) {
      $truck->setPosition($_COOKIE['truckposition']);
    }
    if (isset($_COOKIE['truckdriver'])) {
      $truck->setDriver($_COOKIE['truckdriver']);
    }
    if (isset($_COOKIE['truckloading'])) {
      $truck->setLoading($_COOKIE['truckloading']);
    }
  }
  // Récupérer les valeurs du formulaire
  if (isset($_POST['vehicule'])) {
    $selVehicule = securisation($_POST['vehicule']);
  }
  if (isset($_POST['speed'])) {
    $speed = intval(securisation($_POST['speed']));
  }
  if (isset($_POST['color'])) {
    $color = securisation($_POST['color']);
  }

  if (isset($_POST['action'])) {
    if ($_POST['action'] === 'paint') {
      //printf ('<p>Peindre le véhicule %s</p>', $selVehicule);
      if ($color !== '') {
        if ($selVehicule === 'truck') {
          $truck->setColor($color);
          setcookie('truckcolor', $color);
        }
        else {
          $car->setColor($color);
          setcookie('carcolor', $color);
        }
      }
    }
    elseif ($_POST['action'] === 'drive') {
      //printf ('<p>Rouler avec le véhicule %s</p>', $selVehicule);
      if ($selVehicule === 'truck') {
        $truck->drive($speed);
        setcookie('truckposition', $truck->getPosition());
      }
      else {
        $car->drive($speed);
        setcookie('carposition', $car->getPosition());
      }
    }
    elseif ($_POST['action'] === 'reset') {
      //printf ('<p>Reset du véhicule %s</p>', $selVehicule);
      if ($selVehicule === 'truck') {
        $truck->reset();
        setcookie('truckcolor', $truck->getColor());
        setcookie('truckposition', $truck->getPosition());
        setcookie('truckdriver', $truck->getDriver());
        setcookie('truckloading', $truck->getLoading());
      }
      else {
        $car->reset();
        setcookie('carcolor', $car->getColor());
        setcookie('carposition', $car->getPosition());
        setcookie('cardriver', $car->getDriver());
        setcookie('carpassengers', $car->getPassengers());
      }
    }
    else {
      echo '<p>Action non prévue</p>';
    }
  }
}

require 'views/index.html.php';

?>