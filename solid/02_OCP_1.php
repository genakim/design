<?php
/**
 * OCP (Open/closed principle) - Принцип открытости/закрытости:
 * «Программные сущности (классы, модули, функции и т. п.) должны быть открыты для расширения, но закрыты для изменения».
 * Это означает, что такие сущности могут позволять менять свое поведение без изменения их исходного кода.
 * С изменяемыми «частями» работаем через интерфейсы
 */

interface Shape
{
    public function area();
}

class Square implements Shape
{
    private $width;
    private $height;


    /**
     * Square constructor.
     * @param $height
     * @param $width
     */
    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}

class Circle implements Shape
{
    private $radius;


    /**
     * Square constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return $this->radius * $this->radius * pi();
    }
}

/**
 * Изменяем поведение данного класса
 */
class AreaCalculator
{
    public function calculate($shapes)
    {
        $area = [0];

        foreach ($shapes as $shape) {
            $area[] = $shape->area();
        }

        return array_sum($area);
    }
}
