<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$people_article = new FieldsBuilder('people_article');

$people_article
->addText('title_people', ['label'=>'Tytuł kategorii'])
->addRelationship('people_article', ['label'=>'Trzy Artykuly', 'post_type'=>'people', 'min' => '8','max' => '8',]);
return $people_article;
