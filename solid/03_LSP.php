<?php
/**
 * LSP (Liskov substitution principle) - Принцип подстановки Барбары Лисков:
 * Пусть q(x) является свойством, верным относительно объектов  «x» некоторого типа T.
 * Тогда q(y) также должно быть верным для объектов «y» типа S, где S является подтипом типа T.
 */

/*class VideoPlayer {
    public function play($file)
    {
        //play the video
    }
}

class AviVideoPlayer extends VideoPlayer {
    public function play($file)
    {
        if(pathinfo($file, PATHINFO_EXTENSION) !== 'avi'){
            throw new Exception(); //violate the LSP
        }
    }
}*/

interface LessonRepositoryInterface {
    /**
     * Fetch all records
     *
     * @return array
     */
    public function getAll();
}

class FileLessonRepository implements LessonRepositoryInterface {
    public function getAll()
    {
        return [];
    }
}

class DbLessonRepository implements LessonRepositoryInterface {
    public function getAll()
    {
        //return Lesson::all(); //violate the LSP, because return collection instead array
        return Lesson::all()->toArray(); // correct way
    }
}

function foo(LessonRepositoryInterface $lesson)
{
    $lesson->getAll();
}