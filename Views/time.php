<?php

use controller\Time;

include '../api/ApplicationsController.php';

//Названия месяцев
$months = [
    1 => 'Январь',
    2 => 'Февраль',
    3 => 'Март',
    4 => 'Апрель',
    5 => 'Май',
    6 => 'Июнь',
    7 => 'Июль',
    8 => 'Август',
    9 => 'Сентябрь',
    10 => 'Октябрь',
    11 => 'Ноябрь',
    12 => 'Декабрь'
];

//Варианты окончания слова заявка
$endingArray = [
    'заявка',
    'заявки',
    'заявок'
];

//Выводим ошибку если не создана таблица applications
$data = (new Time)->getTime($months, $endingArray);
if (!is_array($data)) {
    echo $data;
} else {
?>

    <?php foreach ($data as $key => $value) { ?>
        <div class="col-4 col-md-2">
            <span class="row text1"><?= $value['month_year'] ?></span>
            <span class="row text2"><?= $value['message_count'] ?></span>
            <span class="row text3"><?= $value['end'] ?></span>
        </div>
<?php }
} ?>