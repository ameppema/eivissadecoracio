<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

trait Translation
{

	public function translate($column, $default = '')
	{

		$locale = App::getLocale();

		if($this->local == $locale){
			return $default;
		}

		$translation = DB::table('translations')
			->where('table', $this->table)
			->where('column', $column)
			->where('row_id', $this->id)
			->where('locale', $locale)
			->first();

		if($translation){
			return $translation->translation;
		}else{
			return $default;
		}
	}
	public function getTranslate($default = '', $lang = 'es')
	{

		$locale = App::getLocale();

		if($this->local == $locale){
			return $default;
		}

		$translation = DB::table('translations')
			->where('table', $this->table)
			->where('locale', $lang)
			->where('row_id', $this->id)
			->get();

		if($translation){
			return ['titulo_es' => $translation[0]->translation, 'descripcion_es'=>$translation[1]->translation];
		}else{
			return $default;
		}
	}
}