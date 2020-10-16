<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$three_article = new FieldsBuilder('three_article');

$three_article

->addRelationship('three_article', ['label'=>'Trzy Artykuly', 'post_type'=>'post', 'min' => '3','max' => '3',]);
return $three_article;
