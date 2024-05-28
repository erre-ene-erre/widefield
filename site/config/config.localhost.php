<?php 
return [
    'debug' => true,
    'panel' => [
      'install' => true,
    ],
    'kirbytext' => [
        'link' => [
            'target' => '_blank',
        ],
        'image' =>[
            'srcset' => 'default',
            'width' => 1200,
            'loading' => 'lazy'
        ]
    ],
    'thumbs' => [
        'srcsets' => [
            'default' => [
                '300w'  => ['width' => 300, 'quality' => 81],
                '600w'  => ['width' => 600, 'quality' => 80],
                '900w'  => ['width' => 900, 'quality' => 80],
                '1200w' => ['width' => 1200, 'quality' => 80],
                '1800w' => ['width' => 1800, 'quality' => 80]
            ]
        ]
    ],
];
?>