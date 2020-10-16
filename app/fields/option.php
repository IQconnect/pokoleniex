<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$option_page = new FieldsBuilder('option');

$option_page
    ->setLocation('options_page', '==', 'acf-options-ustawienia-strony');

$option_page
    ->addTab('Main', ['label' => 'Ustawienia główne', 'placement' => 'left'])
        ->addText('facebook' , ['label' =>'Adress Facebooka'])
        ->addText('instagram' , ['label' =>'Adress Instagrama'])
        ->addImage('logo', ['wrapper'=>['width'=>'33%'],'label' => 'Logo w menu'])
    ->addTab('Stopka', ['placement' => 'left'])
        ->addText('titlefooter' , ['label' =>'Tytuł dla stopki'])
        ->addSelect('scolor', ['label'=>'Kolor sekcji'])
	->addChoices(['white' => 'Biały'], ['black' => 'Czarny'])
        ->addImage('brand', ['wrapper'=>['width'=>'33%'],'label' => 'Logo w stopce'])
        ->addText('followtext' , ['label' =>'Tekst do social'])
        ->addWysiwyg('info',['label' => 'Tekst w Stopce', 'media_upload' => 0])
        ->addWysiwyg('copyright',['label' => 'Tekst w Stopce Copyright', 'media_upload' => 0])
        ->addImage('iqlogo', ['label' => 'Wykonanie']);


return $option_page;
