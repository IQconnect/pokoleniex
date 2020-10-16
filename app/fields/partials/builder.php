<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('builder');

$builder
    ->addTab('builder', ['placement' => 'left'])
        ->addFlexibleContent('components', ['button_label' => 'Add Component'])
            ->addLayout(get_field_partial('components.hero'))
            ->addLayout(get_field_partial('components.carousel'))
            ->addLayout(get_field_partial('components.videotext'))
            ->addLayout(get_field_partial('components.three_article'))
            ->addLayout(get_field_partial('components.six_article'))
            ->addLayout(get_field_partial('components.cat_article'))
            ->addLayout(get_field_partial('components.bigcat_article'))
            ->addLayout(get_field_partial('components.instaline'))
            ->addLayout(get_field_partial('components.showarticle'))
            ->addLayout(get_field_partial('components.people_article'))
            ->addLayout('content', ['label' => 'Treść']);
return $builder;
