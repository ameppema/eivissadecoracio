<?php

namespace App\Models\Mutators;

use App\Traits\Translation;

trait SlideMutators
{
	use Translation;

	public function getTituloAttribute($value)
	{
		return $this->translate('titulo', $value);
	}

	public function getDescripcionAttribute($value)
	{
		return $this->translate('descripcion', $value);
	}
	public function getTranslationAttribute($value)
	{
		return $this->getTranslate($value);
	}

}