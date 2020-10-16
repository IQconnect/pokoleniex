<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$bigcat_article = new FieldsBuilder('bigcat_article',['label' => '2 Duże 4 małe artykuły do kategorii']);

$bigcat_article
->addText('title_cat', ['label'=>'Tytuł kategorii'])
->addTaxonomy('tax_id', ['label' => 'Link do kategorii', 'field_type' => 'select',])
->addRelationship('cat_article', ['label'=>'Dodaj artykuły', 'post_type'=>'post' , 'min' => '6','max' => '6',]);
return $bigcat_article;
