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
	public function getFullInfoAttribute()
	{
		return ['titulo' => $this->titulo,'descripcion' => $this->descripcion];
	}

}