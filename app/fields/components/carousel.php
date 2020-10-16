<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$carousel = new FieldsBuilder('carousel', ['label' => 'Karuzela wiadomosci']);

$carousel

->addRelationship('carousel', ['label'=>'Artykuly do karuzeli', 'post_type'=>'post', 'min' => '4','max' => '12']);
return $carousel;
