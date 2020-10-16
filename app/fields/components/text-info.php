<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$textInfo = new FieldsBuilder('text-info');

$textInfo
    ->addGroup('text-info', ['label'=>'Text info'])
        ->addDatePicker('label', ['label'=>'Data'])
        ->addText('title', ['label'=>'Tytuł'])
        ->addTextarea('dsc', ['label'=>'Opis', 'new_lines'=>'br'])
        ->addLink('link', ['label'=>'Link', 'new_line'=>'br'])
    ;
return $textInfo;
