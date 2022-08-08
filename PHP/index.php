<?php

//На вход две матрциы (многмерные массивы) на выходе их сумма
// |1 2 3|     |2 2 1|     |1+2 2+2 3+1|     |3 4 4|
// |3 2 1|  +  |3 2 3|  =  |3+3 2+2 1+3|  =  |6 4 4|
// |1 1 1|     |1 1 3|     |1+1 1+1 1+3|     |2 2 4|

function matrix_addition(array $a, array $b): array
{
    for ($i = 0; $i < count($a); $i++) {
        for ($j = 0; $j < count($a[$i]); $j++) {
            $result[$i][$j] = $a[$i][$j] + $b[$i][$j];
        }
    }
    return $result;
}


//На вход массив с именами на выход Джейку и тд нравится
function likes($names): string
{
    return array(
        '0' => "no one likes this",
        '1' => "{$names[0]} likes this",
        '2' => "{$names[0]} and {$names[1]} like this",
        '3' => "{$names[0]}, {$names[1]} and {$names[2]} like this",
        '4' => "{$names[0]}, {$names[1]} and " . (sizeof($names) - 2) . " others like this")[min(4, sizeof($names))];
}

function likesTwo(array $names): string
{
    switch (count($names)) {
        case 0:
            return 'no one likes this';
        case 1:
            return vsprintf('%s likes this', $names);
        case 2:
            return vsprintf('%s and %s like this', $names);
        case 3:
            return vsprintf('%s, %s and %s like this', $names);
        default:
            return sprintf('%s, %s and %d others like this', $names[0], $names[1], count($names) - 2);
    }
}


//findMissing([1, 3, 5, 9, 11]) == 7

function findMissing($list)
{
    $l = count($list);
    return ($list[0] + $list[$l - 1]) * ($l + 1) / 2 - array_sum($list);
}

function findMissingTwo($list)
{
    $increment = (end($list) - $list[0]) / count($list);
    for ($i = 0; $i < count($list) - 1; $i++) {
        if ($list[$i] + $increment != $list[$i + 1]) {
            return $list[$i] + $increment;
        }
    }
    return $list[0];
}


//L = {"ABART 20", "CDXEF 50", "BKWRK 25", "BTSQZ 89", "DRTYM 60"}.
//or
//L = ["ABART 20", "CDXEF 50", "BKWRK 25", "BTSQZ 89", "DRTYM 60"] or ....

function stockList($listOfArt, $listOfCat)
{
    $arr = [];
    $empty = true;
    foreach ($listOfCat as $cat) {
        $sum = 0;
        foreach ($listOfArt as $art) {
            if (substr($art, 0, 1) == $cat) {
                $sumCat = preg_replace('#\D+#', '', $art);
                $sum += $sumCat;
            }

            if ($sum) {
                $empty = false;
            }
        }

        $arr[] = "({$cat} : {$sum})";
    }

    return $empty ? '' : implode(' - ', $arr);
}


//Напишите алгоритм, который будет определять действительные адреса IPv4 в десятичном формате. 
//IP-адреса следует считать действительными, если они состоят из четырех октетов со значениями от 0 до 255 включительно. 
//Гарантируется, что входом в функцию будет одна строка.

function isValidIP(string $str): bool
{
    return filter_var($str, FILTER_VALIDATE_IP);
}

function isValidIPTwo(string $str): bool
{
    return filter_var($str, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
}


//Найти число котороого нет вв массиве

function find_number(array $a): int
{
    return ((count($a) + 1) * (count($a) + 2) / 2) - array_sum($a);
}


//Формат числа 1, 10, 100, 1,000,000

function groupByCommas($n): string
{
    return number_format($n);
}

function groupByCommasTwo($num): string
{
    return number_format($num, 0, '', ',');
}


//Формат строки 'hello' = ['Hello','hEllo','heLlo' ..... и т.д.]
function wave($people)
{
    $result = [];

    for ($i = 0; $i < strlen($people); $i++) {
        if (ctype_space($people[$i])) continue;
        $result[] = substr_replace($people, strtoupper($people[$i]), $i, 1);
    }
    return $result;
}

function waveTwo($people)
{
    if (trim($people) == '') return [];

    $array = [];

    for ($x = 0; $x < strlen($people); $x++) {
        if ($people[$x] == ' ') continue;

        $string = $people;
        $string[$x] = strtoupper($string[$x]);

        $array[] = $string;
    }

    return $array;
}


//получение из 1_song.mp3.sdfsdf -> song.mp3
function fileNameExtractor(string $dirtyFileName): string
{
    preg_match("/\d*_(.*)\./", $dirtyFileName, $result);
    return $result[1];
}

function fileNameExtractorTwo(string $dirtyFileName): string
{
    preg_match('/\d+_([^.]*).([^.]*).*/', $dirtyFileName, $m);
    return "{$m[1]}.{$m[2]}";
}

?>