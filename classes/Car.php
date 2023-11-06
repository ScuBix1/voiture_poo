<?php

class Car extends Vehicule
{
    private $passengers;
    public function __construct(?string $color="black",?int $position=null, ?string $driver = null,?int $passengers=null){
        parent::__construct();
        $this->passengers = $passengers;
    }
    public function setPassengers(int $passengers):void{
        $this->passengers = $passengers;
    }
    public function getPassengers():int{
        return $this->passengers;
    }
    public function reset():void{
        parent::reset();
        $this->color = array_keys(CAR_COLORS)[rand(0, count(CAR_COLORS)-1)];
        $this->driver = CAR_DRIVERS[rand(0, count(CAR_DRIVERS)-1)];
        $this->setPassengers(rand(0,4));
    }
}
?>