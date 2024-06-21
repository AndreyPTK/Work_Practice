<?php
function low_quantity($data) {
    return $data - ($data * 0.5);
}

function high_quantity($data) {
    return $data * 0.5;
}

function medium_quantity($data) {
    return 0;
}

function justfn($data) {
    if ($data < 7) {
        $result = low_quantity($data);
    } elseif ($data > 40) {
        $result = high_quantity($data);
    } elseif ($data == 10) {
        $result = medium_quantity($data);
    } else {
        $result = $data;
    }
    return round($result);
}

function uniqueResults($start_number, $end_number) {
    $unique = [];

    for($start_number; $start_number <= $end_number; $start_number++) {
        $number = justfn($start_number);
        if(!in_array($number, $unique)) {
            $unique[] = $number;
        }
    }
    return count($unique);
}
echo "Количество уникальных результатов для промежутка от 1 до 15: " . uniqueResults(1, 15) . PHP_EOL;
echo "Количество уникальных результатов для промежутка от 3 до 55: " . uniqueResults(3, 55) . PHP_EOL;
echo "Количество уникальных результатов для промежутка от 9 до 43: " . uniqueResults(9, 43) . PHP_EOL;
?>