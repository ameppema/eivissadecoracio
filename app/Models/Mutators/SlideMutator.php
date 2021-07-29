<?php

namespace App\Models\Mutators;

use App\Traits\Translation;

trait SlideMutators
{

	use Translation;

	public function getTitleAttribute($value)
	{
		return $this->translate('titulo', $value);
	}

	public function getContentAttribute($value)
	{
		return $this->translate('descripcion', $value);
	}

}