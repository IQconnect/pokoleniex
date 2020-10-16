<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$gallery = new FieldsBuilder('gallery', ['label' => 'Galeria']);

$gallery
    ->addFields(get_field_partial('components.headline'))
    ->addGallery('gallery',['label' => 'Galeria']);

return $gallery;
