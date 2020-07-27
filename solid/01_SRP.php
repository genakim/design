<?php
/**
 * SPR (Single responsibility principle) - Принцип единственной обязанности:
 * Каждый объект должен иметь одну обязанность и эта обязанность должна быть полностью инкапсулирована в класс.
 * Все его сервисы должны быть направлены исключительно на обеспечение этой обязанности.
 */

/**
 * Формирование отчета
 * Class SalesReporter
 */
class SalesReporter {
    /**
     * @var SalesRepository
     */
    private $repo;

    /**
     * SalesReporter constructor.
     * @param SalesRepository $repo
     */
    public function __construct(SalesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function between($startDate, $startEnd, SalesOutputInterface $formatter)
    {
        $sales = $this->repo->queryDBForSalesBetween($startDate, $startEnd);

        $this->$formatter($sales);
    }
}

/**
 * Запросы к БД
 * Class SalesRepository
 */
class SalesRepository {
    public function queryDBForSalesBetween($startDate, $endDate)
    {
        return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('charge') / 100;
    }
}

/**
 * Для различных вариантов вывода
 * Interface SalesOutputInterface
 */
interface SalesOutputInterface {
    public function output($sales);
}

class HtmlOutput implements SalesOutputInterface {
    public function output($sales)
    {
        return sprintf('<h1>%f</h1>', $sales);
    }
}

// пример
$salesReporter = new SalesReporter(new SalesRepository);
$salesReporter->between('2020-01-01', '2020-02-01', new HtmlOutput);

