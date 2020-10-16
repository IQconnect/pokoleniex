<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$textimg = new FieldsBuilder('textimg',['label' => 'Tekst ze zdjęciami']);

$textimg
->addFields(get_field_partial('components.color'))
->addFields(get_field_partial('components.headline'))
	->addWysiwyg('maintext', ['label' => 'Tekst koło zdjęcia'])
	->addImage('imgbg', ['label' => 'Zdjecie w tle'])
	->addImage('imglogo', ['label' => 'Zdjecie logo']);
return $textimg;
