<?php
/**
 * DIP (Dependency inversion principle) - Принцип инверсии зависимостей:
 * Принцип объектно-ориентированного программирования, используемый для уменьшения связанности в компьютерных программах.
 * Формулировка:
 * Модули верхних уровней не должны зависеть от модулей нижних уровней. Оба типа модулей должны зависеть от абстракций.
 * Абстракции не должны зависеть от деталей. Детали должны зависеть от абстракций.
 */

interface ConnectionInterface {
    public function connect();
}

class DbConnection implements ConnectionInterface {

    public function connect()
    {
        // TODO: Implement connect() method.
    }
}

/**
 * High level class
 * Class PasswordReminder
 */
class PasswordReminder {

    private $dbConnection;

    public function __construct(
        //MySQLConnection $dbConnection // violate the DIP, because mysql is low level concrete class
        ConnectionInterface $dbConnection
    )
    {
        $this->dbConnection = $dbConnection;
    }
}