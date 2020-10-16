<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$people = new FieldsBuilder('people');

$people
    ->setLocation('post_type', '==', 'people');

$people
->addFields(get_field_partial('partials.articlebuilder'));
return $people;
