<?php

/**
 * This pattern allows you to repurpose a class with a different interface,
 * allowing it to be used by a system which uses different calling methods
 *
 * @see FilesystemAdaptor in Laravel
 */

interface BookInterface {
    public function open();
    public function turnPage();
}

interface eReaderInterface {
    public function turnOn();
    public function pressNextButton();
}

class Book implements BookInterface {
    public function open()
    {
        echo 'opening the paper book';
    }

    public function turnPage()
    {
        echo 'turning the page of the paper book';
    }
}

class Kindle implements eReaderInterface {
    public function turnOn()
    {
        echo 'eReader on';
    }

    public function pressNextButton()
    {
        echo 'eReader next';
    }

}

/**
 * Adapter
 * Class eReaderAdapter
 */
class eReaderAdapter implements BookInterface {

    private $reader;

    /**
     * eReaderAdapter constructor.
     * @param eReaderInterface $reader
     */
    public function __construct(eReaderInterface $reader)
    {
         $this->reader = $reader;
    }

    public function open()
    {
        $this->reader->turnOn();
    }

    public function turnPage()
    {
        $this->reader->pressNextButton();
    }
}

class Person {
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person())->read(new eReaderAdapter(new Kindle()));