<?php
$data = [
    'category1' => [
        'price' => 123,
        'name' => 'hello'
    ],
    'category2' => [
        'price' => 321,
        'name' => 'good'
    ],
    'category3' => [
        'price' => 123,
        'name' => 'wordly'
    ],
    'category4' => [
        'price' => 777,
        'name' => 'sun'
    ],
    'category5' => [
        'price' => 9795,
        'name' => 'слово'
    ],
    // 'category4' => [
    //     'price' => 444,
    //     'name' => 'wordly'
    // ],
];

for($a = 6; $a <= 35; $a++) { // С помощью цикла добавим еще несколько записей в массив
    if($a % 7 == 0) {
        $a += 19;
    }
    $category_name = 'category' . $a;
    $data[$category_name] = [
        'price' => 456 + $a,
        'name' => 'wordly'
    ];
}

function searchSovpadeniya($data, $searchParams) {
    $example_price = $searchParams['price'];
    $example_name = $searchParams['name'];
    $foundInstance = [];
    $result = [];
    
    foreach ($data as $category_name => $values) {
        if (($values['price'] === $example_price) || ($values['name'] === $example_name)) {
            $variant = " value:" . $values['price'] . " and name is: " . $values['name'];
            if (!isset($foundInstance[$variant])) {
                $result[$category_name] = $values;
                $foundInstance[$variant] = true;
            }
        }
    }
    return $result;
}

// Создание "маски" для фильтрации
$example = [
    'price' => 123,
    'name' => 'wordly'
];

print_r(searchSovpadeniya($data, $example));
?>