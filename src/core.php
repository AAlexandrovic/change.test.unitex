<?php

namespace Core;

/**
 * Класс выполняет подключение к бд, а так же содержит некоторые основные функции
 */
class dbConnection
{

  //Выполняем подключение к бд нужно для работы функций класса
  protected object $link;

  public function __construct()
  {
    //получаем конфиг бд
    $bdConfig = include 'config.php';

    $this->link = mysqli_connect($bdConfig['host'], $bdConfig['name'], $bdConfig['password'], $bdConfig['dbname']);
  }

  /**
   * Выполняет запрос mysql
   * @param string $sql сам переданный запрос 
   */
  static function sql($sql)
  {
    $link = (new dbConnection)->link;
    return mysqli_query($link, $sql);
  }

  /**
   * Выводит все данные запроса в виде массива
   * @param $result полученный mysql ответ
   */
  static function getAll($result)
  {
    $data = [];
    if (!$result) {
      $text = 'Не создана нужная таблица';
      return $text;
    }
    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }
    return $data;
  }

  /**
   * фильтруем полученные данные на наличие sql инъекций
   * @param $val полученная строка или число
   */
  static function filter($val)
  {
    $link = (new dbConnection)->link;
    return trim(mysqli_real_escape_string($link, $val));
  }
}
