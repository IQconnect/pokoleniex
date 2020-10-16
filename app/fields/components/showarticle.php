<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$showarticle = new FieldsBuilder('showarticle');

$showarticle
->addText('title_show', ['label'=>'Tytuł kategorii'])
->addRelationship('showarticle', ['label'=>'Trzy Artykuly', 'post_type'=>'post', 'min' => '4','max' => '4',]);
return $showarticle;
