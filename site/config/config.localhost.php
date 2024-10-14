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
    'hashandsalt.kirby-snipcart.snipcartlive' => true,
    'hashandsalt.kirby-snipcart.apikeytest'   => 'NzM2YjYwYWUtMmRjNS00OTUwLTljNjQtZWUwOGYwNDQ4M2U4NjM4Mzk5ODE0ODI3MTExMTc5',
    'hashandsalt.kirby-snipcart.apikeylive'   => 'OThjOTFhMzEtZGY5ZS00NzQ1LTgyOTYtMDY3NWMzY2Q5YjI1NjM4Mzk5ODE0ODI3MTExMTc5',

    'hashandsalt.kirby-snipcart.apisecrettest' => 'ST_YWI4MmE5ZjEtOWM0NC00OWM4LWJkNTAtNDNiNjJjYzYwOTQyNjM4NTYyODM0NDE0ODA2OTcx',
    'hashandsalt.kirby-snipcart.apisecretlive' => 'S_N2UzOTA2MGItNmI3Ny00OWQ3LWJjYWEtYjU3YzUyYWVhNmQyNjM4NjQyNDY4OTY3NzgyODAx',
    'routes' => [
      [
        'pattern' => '(:any)',
        'action' => function($id) {
          if($id != 'artists'){
            $page = page($id);
          } else {$page = '';}
          if ($page && $page->hasListedChildren()) {
            if ($firstChild = $page->children()->listed()->first()) {
              return $firstChild->go();
            }
          }
          $this->next();
        }
      ]
    ]
];
?>