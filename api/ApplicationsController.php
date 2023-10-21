<?php

namespace controller;

use Core\dbConnection;

require $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';

/**
 * Класс получает данные для view time.php
 * 
 */
class Time extends dbConnection
{

    /**
     * object $mysql содержит в себе данные для подключения к бд а так-же основные функции работы с ней
     */
    public object $mysql;

    /**
     * Вызываем класс dbConnection и передаём его в параметр $mysql
     */
    public function __construct()
    {
        $this->mysql = (new dbConnection);
    }

    /**
     * Получаем данные о количестве заявок за последние 6 месяцев
     * 
     * @param array $time - включает в себя название месяцев для замены цифры месяца на его имя
     * @param array $end - Нужен для выбора правильного окончания после подсчёта количества
     */
    public function getTime($time = [], $end = [])
    {

        $sql = "SELECT COUNT(*) AS message_count, DATE_FORMAT(date, '%m') AS month_year
         FROM applications
         WHERE date >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
        GROUP BY month_year
        ORDER BY month_year ASC;";

        $result = $this->mysql::sql($sql);

        $data = $this->mysql::getAll($result);
        
        if(!is_array($data)) {
            return $data;
        }

        foreach ($data as $k => $value) {
            foreach ($time as $key => $val) {
                if ($value['month_year'] == $key) {
                    $data[$k]['month_year'] = $val;
                    $data[$k]['end'] = $this->getNumEnding($value['message_count'], $end);
                }
            }
        }

        return $data;
    }

    /**
     * Функция выбора правильного окончания
     * @param int $number передаваемое число
     * @param array $endingArray варианты окончаний
     */
    protected function getNumEnding($number, $endingArray)
    {
        $number = $number % 100;
        if ($number >= 11 && $number <= 19) {
            $ending = $endingArray[2];
        } else {
            $i = $number % 10;
            switch ($i) {
                case (1):
                    $ending = $endingArray[0];
                    break;
                case (2):
                case (3):
                case (4):
                    $ending = $endingArray[1];
                    break;
                default:
                    $ending = $endingArray[2];
            }
        }
        return $ending;
    }
}

/**
 * Класс получает данные для view applications.php
 * 
 */
class Applications extends Time
{
    /**
     * Функция возвращает все существующие заявки
     */
    public function getApplications()
    {
        $sql = "SELECT 
                     id, 
                     name , 
                     DATE_FORMAT(date, '%d.%m.%Y') AS date , 
                     mail, number, city  
                FROM applications";

        $result = $this->mysql::sql($sql);

        $data = $this->mysql::getAll($result);

        return $data;
    }

    /**
     * Функция изменяет данные в таблице applications
     * 
     * @param array $post передает пост запрос в функцию
     */
    public function changeApplicationTable($post)
    {

        //Если пришёл запрос с delete то удаляем запись по её id
        if (isset($post['delete'])) {
            $id = $this->mysql::filter($post['id']);
            $sql = "DELETE FROM applications WHERE id = '$id'";
            $this->mysql::sql($sql);

        } elseif ($post['create']) { //Если пришёл запрос create

            //Проверяем не пришли ли пустые строки из формы
            if (empty($post['name']) || empty($post['mail']) || empty($post['number']) || empty($post['city'])) {
                $error = ['error' => 'Введены не все поля'];
                
                //Возвращаем json ответ
                echo json_encode($error);
                return true;

            } else {

                $name = $this->mysql::filter($post['name']);
                $mail = $this->mysql::filter($post['mail']);
                $number = $this->mysql::filter($post['number']);
                $city = $this->mysql::filter($post['city']);

                $sql = "INSERT INTO applications (name, mail, number, city) VALUES ('$name', '$mail', '$number', '$city')";

                $this->mysql::sql($sql);

                $success = ['success' => 'Успех'];
                echo json_encode($success);
                return true;
            }
        }
    }
}

// передаём нужный массив в класс
if (isset($_POST['delete'])) {
    (new Applications)->changeApplicationTable($_POST);
} elseif (isset($_POST['create'])) {
    (new Applications)->changeApplicationTable($_POST);
}
