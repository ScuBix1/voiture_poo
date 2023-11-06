<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PHP - POO et interfaces</title>
    <!-- CSS Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- CSS perso -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Ce CSS doit être inline pour pouvoir être modifié par le code PHP -->
    <style media="screen">
      #car {
        transform: translateX(<?= $car->getPosition() ?>px);
        color: <?= $car->getColor() ?>;
      }
      #truck {
        transform: translateX(<?= $truck->getPosition() ?>px);
        color: <?= $truck->getColor() ?>;
      }
    </style>
</head>
<body>
  <header>
    <h1>PHP - POO et héritage</h1>
  </header>
  <div class="grid">
    <aside class="aside">
      <h2>Choisissez vos options</h2>
      <form class="vehicule-form" action="index.php" method="post">
        <div class="row">
          <fieldset>
            <legend>Sélection du véhicule</legend>
            <label for="camion">Camion</label>
            <input id="camion" type="radio" name="vehicule" value="truck" <?php if ($selVehicule === 'truck') echo "checked" ?> required>
            <label for="voiture">Voiture</label>
            <input id="voiture" type="radio" name="vehicule" value="car" <?php ;if ($selVehicule === 'car') echo "checked"?> required>
          </fieldset>
        </div>
        <div class="row">
          <fieldset>
            <legend>Options</legend>
            <select class="color" name="color">
              <option value="">Couleur du véhicule</option>
<?php foreach (CAR_COLORS as $cssColor => $displayColor) { ?>
              <option value="<?= $cssColor ?>"><?= $displayColor ?></option>
<?php } ?>
            </select>
            <button type="submit" name="action" value="color" class="btn btnColor"><i class="fa-solid fa-paintbrush"></i> Peindre</button>
            <span>Vitesse : </span>
            <input type="number" name="speed" value="<?= $speed ?>" min="10" max="130" step="10">
            <button type="submit" name="action" value="drive" class="btn btnDrive"><i class="fa-solid fa-car-side"></i> Rouler</button>
            <button type="submit" name="action" value="reset" class="btn btnReset"><i class="fa-solid fa-hand"></i> Reset</button>
          </fieldset>
        </div>
      </form>
    </aside>
    <main>
      <div class="vehicule">
        <div id="car" class="car">
          <i class="fa-solid fa-car-side fa-4x"></i>
        </div>
        <div class="road">
          <div class="infos">
            <span class="driver"><?= $car->getDriver(); ?></span>&nbsp;
            <span class="passengers"><?= $car->getPassengers(); ?>&nbsp;<i class="fa-solid fa-person"></i></span>&nbsp;
            <span class="position"><?= $car->getPosition(); ?> km</span>
          </div>
        </div>
      </div>
      <div class="vehicule">
        <div id="truck" class="truck">
          <i class="fa-solid fa-truck fa-4x"></i>
        </div>
        <div class="road">
          <div class="infos">
            <span class="driver"><?= $truck->getDriver(); ?></span>&nbsp;
            <span class="loading"><i class="fa-solid fa-truck-ramp-box"></i>&nbsp;<?= $truck->getLoading(); ?> tonnes</span>&nbsp
            <span class="position"><?= $truck->getPosition(); ?> km</span>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>