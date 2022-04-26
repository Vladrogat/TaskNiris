<?php
session_start();
require_once "vendor/autoload.php";
use \App\Services\DB;

//
$errors = [];


if (!empty($_POST)) {
    //--------------------Валидация---------------------//

    if ( strlen(trim($_POST["name"])) > 0 && is_numeric($_POST["square"]) && is_numeric($_POST["population"])) {
        DB::start();
        if (DB::addCity($_POST["name"], $_POST["square"], $_POST["population"])){
            header("Location: /");
        } else {
            $errors[] = "Не удалось добавть город";
        }
        DB::close();
    }else {
        $errors[] = "Данные не коректны";
    }
} else {
    $errors[] = "Запрос не был отправлен";
}
//сохранение ошибок в сессию
$_SESSION["errors"] = $errors;
header("Location: /");
