<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$videotext = new FieldsBuilder('videotext');

$videotext
		->addRelationship('videotext', ['label'=>'Artykuly do Video sekcji', 'post_type'=>'post', 'taxonomy' => ['category:video'] , 'filters' => [0 => 'search']]);
return $videotext;
