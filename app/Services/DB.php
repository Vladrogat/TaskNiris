<?php

namespace App\Services;

class DB
{
    /**
     * Статичное свойство хранящее подключение к бд
     * @var $connect
     */
    private static $connect;

    /**
     * Метод осуществляющий подключение к бд и зконфигурации
     * @return void
     */
    public static function start()
    {
        $config = require "config/db.php";
        self::$connect = new \mysqli(
            $config["host"], $config["username"],
            $config["password"], $config["db"], $config["port"]);
        mysqli_set_charset(self::$connect, "utf8mb4");
    }

    /**
     * Метод добавляющий новый город
     * @param string $name
     * @param double $square
     * @param int $population
     * @return bool
     */
    public static function addCity($name, $square, $population)
    {
        $name = mysqli_real_escape_string(self::$connect, $name);
        $square = mysqli_real_escape_string(self::$connect, $square);
        $population = mysqli_real_escape_string(self::$connect, $population);
        $sql = "INSERT INTO `cities` ( `id`, `name`, `square`, `population`) VALUES ( NULL, ?, ?, ?)";
        $result = self::$connect->prepare($sql);
        $result->bind_param("sss", $name, $square, $population);
        return $result->execute();
    }

    /**
     * Метод возвращающий все поля таблицы Городов
     * @return array
     */
    public static function getAll()
    {
        $sql = "SELECT * FROM  cities";
        $result = [];
        $query = mysqli_query(self::$connect, $sql);
        while( $res = mysqli_fetch_array($query))
        {
            $result[] = $res;
        }
        return $result;
    }

    /**
     * Метод закрывает подключение к бд
     * @return void
     */
    public static function close()
    {
        self::$connect->close();
    }
}