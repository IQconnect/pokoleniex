<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$sponsor= new FieldsBuilder('sponsor',['label' => 'Sponsorzy']);

$sponsor

->addFields(get_field_partial('components.color'))
->addFields(get_field_partial('components.headline'))
	->addRepeater('sinfo')
	->addText('sponsortitle', ['label' => 'Tytuł','wrapper' => ['width' => '15%']])
	->addWysiwyg('sponsortext', ['label' => 'Tekst koło zdjęcia','wrapper' => ['width' => '30%']])
	->addImage('sponsorimg', ['label' => 'Zdjecie','wrapper' => ['width' => '20%']])
	->addText('sponsorbutton', ['label' => 'Tekst do przycisku','wrapper' => ['width' => '15%']])
	->addLink('sponsorlink', ['label' => 'Link do strony','wrapper' => ['width' => '100%']])
	->endRepeater();
return $sponsor;
