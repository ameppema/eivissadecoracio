<?php

namespace App\Models\Mutators;

use App\Traits\Translation;

trait menuMutators
{
	use Translation;

	public function getNombreAttribute($value)
	{
		return $this->translate('nombre', $value);
	}

	public function getRutaAttribute($value)
	{
		return $this->translate('ruta', $value);
	}
}