<?php
/**
 * The Decorator pattern allows us to add new or additional behavior to an object during runtime,
 * depending on the situation.
 */

interface CarService
{
    public function getCost();

    public function getDescription();
}

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return 'Basic inspection';
    }
}

class OilChange implements CarService
{
    protected $carService;

    /**
     * OilChange constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ' and oil change';
    }
}

class TireRotation implements CarService
{
    protected $carService;

    /**
     * OilChange constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ' and a tire rotation';
    }
}


$service = new OilChange(new BasicInspection);
echo $service->getCost();
echo $service->getDescription();

$service = new OilChange(new TireRotation(new BasicInspection));
echo $service->getCost();
echo $service->getDescription();

