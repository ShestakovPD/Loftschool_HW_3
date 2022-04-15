<?php

//Задание № 1

function task1($num)
{
    for ($i = 0; $i < $num; $i++) {

        $names = ['Петя', 'Вася', 'Коля', 'Миша', 'Толя'];
        $namesR = $names[random_int(0, 4)];
        $ageR = random_int(18, 45);

        $arr = ['id' => $i, 'name' => $namesR, 'age' => $ageR];
        $mass[] = $arr;

    }

    return $mass;
}

function task2($names)
{

    foreach ($names as $key => $value) {

        if ($value['name'] == 'Петя') {
            $name1++;
        } elseif ($value['name'] == 'Вася') {
            $name2++;
        } elseif ($value['name'] == 'Коля') {
            $name3++;
        } elseif ($value['name'] == 'Миша') {
            $name4++;
        } elseif ($value['name'] == 'Толя') {
            $name5++;
        } else {
            $name1 = 0;
            $name2 = 0;
            $name3 = 0;
            $name4 = 0;
            $name5 = 0;
        }

    }
    echo 'Имя Петя встречается в этом списке ' . $name1 . ' раз';
    ?><br><?
    echo 'Имя Вася встречается в этом списке ' . $name2 . ' раз';
    ?><br><?
    echo 'Имя Коля встречается в этом списке ' . $name3 . ' раз';
    ?><br><?
    echo 'Имя Миша встречается в этом списке ' . $name4 . ' раз';
    ?><br><?
    echo 'Имя Толя встречается в этом списке ' . $name5 . ' раз';

}

function task3($names)
{

    foreach ($names as $key => $value) {
        $var = ($value['age']);
        $ageSum += $var;
        $count++;
    }
    $agesS = $ageSum / $count;
    ?><br><?
    echo "Средний возраст юзеров " . "$agesS";
}
