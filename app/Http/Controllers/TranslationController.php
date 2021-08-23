<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Support\Facades\DB;

class TranslationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $table
     * @param  string column
     * @param  string | number  $row_id
     * @param  string  $locale
     * @return void
     */
    public function store($translation, $table, $column, $row_id, $locale)
    {
        Translation::create([
            'locale' => $locale,
            'table' => $table,
            'column' => $column,
            'row_id' => $row_id,
            'translation' => $translation,
        ]);
        return;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  string $column
     * @param  string $translation
     * @param  integer  $row_id
     * @param  string $table
     * @return void
     */
    public function update($column,$translation,$row_id,$table)
    {
        $translation = DB::table('translations')
                        ->where('row_id', $row_id)
                        ->where('column', $column)
                        ->where('table', $table)
                        ->update(['translation' => $translation]);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $row_id , $table)
    {
        $translations = DB::table('translations')
                            ->where('table', $table)
                            ->where('row_id', $row_id);

        foreach($translations as $translation){
            $translations->delete();
        }
        return;
    }
}
