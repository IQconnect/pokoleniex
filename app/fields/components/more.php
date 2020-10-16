<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$more = new FieldsBuilder('more');

$more
	->addText('moretext', ['label'=>'Napis do linka'])
	->addLink('morelink', ['label'=>'Adres Linka']);

return $more;
