<?php

namespace App\Models\Mutators;

use App\Traits\Translation;

trait ModuleMutators
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
	public function getTextoPrincipalAttribute($value)
	{
		return $this->translate('texto_principal', $value);
	}
	public function getTextoSecundarioAttribute($value)
	{
		return $this->translate('texto_secundario', $value);
	}
	public function getTextoTresAttribute($value)
	{
		return $this->translate('texto_tres', $value);
	}
	public function getTranslationAttribute($value)
	{
		return ['titulo_en' => $this->getTranslate($value,'en')[0]->translation,
                'descripcion_en'=>$this->getTranslate($value,'en')[1]->translation,
                'texto_principal_en'=>$this->getTranslate($value,'en')[2]->translation,
                'texto_secundario_en'=>$this->getTranslate($value,'en')[3]->translation,
                'texto_tres_en'=>$this->getTranslate($value,'en')[4]->translation,
            ];
	}

}