<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$cat_article = new FieldsBuilder('cat_article',['label' => 'Artykuły do kategorii']);

$cat_article
->addText('title_cat', ['label'=>'Tytuł kategorii'])
->addTaxonomy('tax_id', ['label' => 'Link do kategorii', 'field_type' => 'select',])
->addSelect('articlegrid', ['label'=>'Układ artykułów'])
	->addChoices(['1bx5' => 'Jeden duży 4 małe (5 artykułów)'], ['2bx6' => 'Dwa duże 4 małe (6 artykułów)'], ['2rbx6' => 'Dwa duże po prawej (6 artykułów)'],['2lx6' => 'Dwa wielkie 4 małe(6 artykułów)'])
->addRelationship('cat_article', ['label'=>'Dodaj artykuły', 'post_type'=>'post' , 'min' => '5','max' => '6',]);
return $cat_article;
