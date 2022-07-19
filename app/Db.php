<?php


namespace app;


class Db
{
    public $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
}
