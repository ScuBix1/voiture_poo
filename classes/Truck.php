<?php

class Truck extends Vehicule
{
    private $loading;
    public function __construct(?string $color = 'black', ?int $position = 0, ?string $driver = null, ?int $loading = null){
        parent::__construct();
        $this->loading = $loading;
    }

    public function setLoading(int $loading): void
    {
        $this->loading = $loading;
    }

    public function getLoading():int
    {
        return $this->loading;
    }
    public function reset():void{
        parent::reset();
        $this->color = array_keys(CAR_COLORS)[rand(0, count(CAR_COLORS)-1)];
        $this->driver = TRUCK_DRIVERS[rand(0, count(TRUCK_DRIVERS)-1)];
        $this->loading = rand(1,45);
    }
}
?>