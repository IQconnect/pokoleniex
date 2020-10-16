<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$modal = new FieldsBuilder('modal', ['label' => 'Modal']);

$modal
    ->addRepeater('modal')
      ->addGroup('player')
        ->addImage('image', ['label' => 'Zdjęcie', 'wrapper' => ['width' => '80%']])
        ->addText('name', ['label' => 'Imię i nazwisko', 'wrapper' => ['width' => '30%']])
        ->addText('nick', ['label' => 'Ksywa', 'wrapper' => ['width' => '30%']])
        ->addText('number', ['label' => 'Numer', 'wrapper' => ['width' => '30%']])
        ->addText('wzrost', ['label' => 'Wzrost', 'wrapper' => ['width' => '30%']])
        ->addText('club', ['label' => 'Klub', 'wrapper' => ['width' => '30%']])
        ->addText('position', ['label' => 'Pozycja', 'wrapper' => ['width' => '30%']])
        ->addText('best', ['label' => 'Największe osiągnięcie', 'wrapper' => ['width' => '30%']])
        ->addText('rw', ['label' => 'Rzuty wolne', 'wrapper' => ['width' => '30%']])
        ->addText('pt2', ['label' => 'Rzuty za 2', 'wrapper' => ['width' => '30%']])
        ->addText('pt3', ['label' => 'Rzuty za 3', 'wrapper' => ['width' => '30%']])
        ->addText('zb', ['label' => 'Zbiórki', 'wrapper' => ['width' => '30%']])
        ->addText('pr', ['label' => 'Przechwyty', 'wrapper' => ['width' => '30%']])
        ->addText('as', ['label' => 'Asysty', 'wrapper' => ['width' => '30%']])
        ->addText('bl', ['label' => 'Bloki', 'wrapper' => ['width' => '30%']])
        ->endRepeater();

return $modal;
