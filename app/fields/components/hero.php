<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$hero = new FieldsBuilder('hero');

$hero
->addRelationship('posthero', ['label'=>'Artykuly do hero', 'post_type'=>'post', 'min' => '5','max' => '5',]);
return $hero;
