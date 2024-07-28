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
    'hashandsalt.kirby-snipcart.snipcartlive' => false,
    'hashandsalt.kirby-snipcart.apikeytest'   => 'NzM2YjYwYWUtMmRjNS00OTUwLTljNjQtZWUwOGYwNDQ4M2U4NjM4Mzk5ODE0ODI3MTExMTc5',
    'hashandsalt.kirby-snipcart.apikeylive'   => 'XXXX',

    'hashandsalt.kirby-snipcart.apisecrettest' => 'ST_YWI4MmE5ZjEtOWM0NC00OWM4LWJkNTAtNDNiNjJjYzYwOTQyNjM4NTYyODM0NDE0ODA2OTcx',
    'hashandsalt.kirby-snipcart.apisecretlive' => 'XXXX',
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