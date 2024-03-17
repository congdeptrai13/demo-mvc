<?php
class DB
{
    private static $instance = NULL;
    public static function getInstance()
    {
        if (!isset (self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=demo_mvc', "root", "");
                self::$instance->exec("SET NAMES 'utf8'");
                // print_r(DB::getInstance());

            } catch (PDOException $ex) {
                // print_r(DB::getInstance());
                die ($ex->getMessage());
            }
        }

        return self::$instance;
    }
}