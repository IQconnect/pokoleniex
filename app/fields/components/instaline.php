<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$instaline = new FieldsBuilder('instaline', ['label' => 'Instagram linia']);

$instaline
	->addGallery('instaline_galleryone',['label' => 'Galeria'])
	->addText('instaline_text',['label' => 'Text do insta'])
	->addLink('instaline_link',['label' => 'Link do insta'])
	->addGallery('instaline_gallerytwo',['label' => 'Galeria']);

return $instaline;
