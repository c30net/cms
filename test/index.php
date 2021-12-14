<?php
$x = [
    [
        'name' =>[
            'firstname' => 'reza',
            'lastname' => 'nickzad'
        ],
        'username' => 'reza765'
    ],
    [
        'name' =>[
            'firstname' => 'morteza',
            'lastname' => 'bihodeh'
        ],
        'username' => 'morte765'
    ],
    [
        'name' =>[
            'firstname' => 'ali',
            'lastname' => 'kamali'
        ],
        'username' => 'ali765'
    ]
];

$y = ['a' => 'b',
        [
            'c' => 'd'
        ]
    ];

print_r($y[0]['c']);

$z = $y;
$z[0]['c'] = 'kkkkkkkkk';


print_r($z[0]['c']);










