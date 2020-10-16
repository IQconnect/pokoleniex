<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$media = new FieldsBuilder('media',['label' => 'Media']);

$media
	->addFields(get_field_partial('components.color'))
	->addFields(get_field_partial('components.headline'))

->addGroup('firstbutton',['label' => 'Pierwszy przycisk'])
		->addImage('imgone', ['label' => 'Zdjecie w tle'])
		->addText('textone', ['label' => 'Tekst przycisku'])
		->addLink('linkone', ['label'=>'Adres pierwszego przycisku'])
		->endGroup()
->addGroup('secondbutton',['label' => 'Drugi przycisk'])
		->addImage('imgtwo', ['label' => 'Zdjecie w tle'])
		->addText('texttwo', ['label' => 'Tekst przycisku'])
		->addLink('linktwo', ['label'=>'Adres drugiego przycisku'])
		->endGroup();
return $media;
