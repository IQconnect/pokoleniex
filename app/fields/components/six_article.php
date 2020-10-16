<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$six_article = new FieldsBuilder('six_article',['label' => 'Sekcja z 6 artykułami']);

$six_article
->addSelect('uparticlemargin', ['label'=>'Dodać margines na górze sekcji?'])
	->addChoices(['upmarginon' => 'Z Marginesem'],['upmarginoff' => 'Bez Marginesu'])
->addSelect('downarticlemargin', ['label'=>'Dodać margines na dole sekcji?'])
	->addChoices(['downmarginon' => 'Z Marginesem'],['downmarginoff' => 'Bez Marginesu'] )
->addRelationship('six_article', ['label'=>'Trzy Artykuly', 'post_type'=>'post', 'min' => '6','max' => '6',]);
return $six_article;
