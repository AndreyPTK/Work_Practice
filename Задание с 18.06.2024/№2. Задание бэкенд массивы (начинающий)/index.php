<?php
$data = [
    'category' => [
        'one' => [
            'priority' => '3',
            'views' => [
                'user_count' => 345,
                'bot_count' => 9392
            ]
        ],
        'two' => [
            'priority' => '1',
            'views' => [
                'user_count' => 123222,
                'bot_count' => 99
            ]
        ],
        'three' => [
            'priority' => '2',
            'views' => [
                'user_count' => 23,
                'bot_count' => 1
            ]
        ]
    ]
];

$max_bc = 0;
$min_bc = 0;
$caterogies = [];

foreach ($data['category'] as $key => $category) {
    $bot_count = $category['views']['bot_count'];
    
    if ($max_bc == 0 || $bot_count > $max_bc) {
        $max_bc = $bot_count;
    }

    if ($min_bc == 0 || $bot_count < $min_bc) {
        $min_bc = $bot_count;
    }

    $caterogies[] = [
        'priority' => $category['priority'],
        'user_count' => $category['views']['user_count'],
        'bot_count' => $bot_count
    ];
}

echo "Максимальное значение bot_count: " . $max_bc . ", а также его минимальное значение: " . $min_bc . PHP_EOL;

function arraySortFunction($a, $b) {
    if ($a['priority'] == $b['priority']) {
        return 0;
    }
    return ($a['priority'] < $b['priority']) ? -1 : 1;
}

usort($caterogies, "arraySortFunction");

foreach ($caterogies as $value) {
    echo "Приоритет: №" . $value['priority'] . "; user_count: " . $value['user_count'] . ", bot_count: " . $value['bot_count'] . PHP_EOL;
}
?>