<?php
class Config {
    public $user =  
        [
            1 => [
                'id'        => 1,
                'name'      => 'K',
                'firstname' => 'Melting',
                'mail'      => 'integrateur@melting-k.fr',
                'pass'      => 'cnifcnif31',
                'role'      => 'admin'
            ],
            2 => [
                'id'        => 2,
                'name'      => 'Riton',
                'firstname' => 'Chez',
                'mail'      => 'contact@epicerieriton.fr',
                'pass'      => '4Y3xUTte5',
                'role'      => 'author'
            ]
        ];
     public $site =  
         [
            'name'          => 'Chez Riton',
            'mail'          => 'contact@epicerieriton.fr',
            'domain'        => 'www.epicerieriton.fr',
            'url'           => 'https://www.epicerieriton.fr',
            'srcimg'        => 'img/logo-blanc.png',
            'colorimg'      => '#243648'
        ];
};
?>