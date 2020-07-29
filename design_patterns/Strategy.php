<?php
/**
 * The strategy pattern is based on algorithms.
 * You encapsulate specific families of algorithms allowing the client class responsible
 * for instantiating a particular algorithm to have no knowledge of the actual implementation.
 */

// Encapsulate and make them interchangeable
interface Logger
{
    public function log($data);
}

// Define a family of algoritms
class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a file');
    }

}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to the database');
    }

}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a Saas site');
    }
}

// Usage
class App {
    public function log($data, Logger $logger)
    {
        $logger->log($data);
    }
}

$app = new App();
$app->log('Some information here', new LogToXWebService());
$app->log('Some information here', new LogToDatabase());
$app->log('Some information here', new LogToFile());