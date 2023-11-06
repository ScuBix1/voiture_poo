<?php

require 'lib/InterfaceVehicule.php';

// Définition de la classe Vehicule
class Vehicule implements InterfaceVehicule
{
  // Définition des attributs
  protected $color;
  protected $position;
  protected $driver;
  
  // Constructeur de la classe
  public function __construct(?string $color = 'black', ?int $position = 0, ?string $driver = null)
  {
    $this->color = $color;
    $this->position = $position;
    $this->driver = $driver;
  }
  
  public function drive(int $speed):void
  {
    
    $this->position = $speed+$this->position;
  }

  public function reset():void
  {
    $this->position = 0;
  }
  
  public function setColor(string $color): void
  {
    $this->color = $color;
  }

  public function getColor(): string
  {
    return $this->color;
  }

  public function setPosition(int $position): void
  {
    $this->position = $position;
  }

  public function getPosition(): int
  {
    return $this->position;
  }

  public function setDriver(string $driver): void
  {
    $this->driver = $driver;
  }

  public function getDriver(): string
  {
    return $this->driver;
  }

  
}
?>