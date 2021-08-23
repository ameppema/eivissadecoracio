<?php

namespace App\Models\Mutators;

use App\Traits\Translation;

trait PartnerMutators
{
	use Translation;

	public function getTituloAttribute($value)
	{
		return $this->translate('titulo', $value);
	}

	public function getSubtituloAttribute($value)
	{
		return $this->translate('subtitulo', $value);
	}

	public function getTranslationAttribute($value)
	{
		return ['titulo_en' => $this->getTranslate($value)[0]->translation, 'subtitulo_en' => $this->getTranslate($value)[1]->translation];
	}
}