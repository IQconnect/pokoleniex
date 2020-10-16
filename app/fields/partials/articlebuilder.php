<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$articlebuilder = new FieldsBuilder('articlebuilder');

$articlebuilder
->addTab('videotab', ['placement' => 'left','label' => 'Link do Video'])
    ->addoEmbed('videolink', ['label' => 'Link do Video'])
    ->addWysiwyg('videoarticle', ['label' => 'Tekst do Video'])
    ->addTab('articlebuilder', ['placement' => 'left','label' => 'Builder'])
        ->addFlexibleContent('components', ['button_label' => 'Add Component'])
            ->addLayout(get_field_partial('components.carousel'))
            ->addLayout('content', ['label' => 'Treść']);
return $articlebuilder;
