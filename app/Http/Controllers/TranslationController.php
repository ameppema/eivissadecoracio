<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
     * Display the specified resource.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function show(Translation $translation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function edit(Translation $translation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function update($column,$translation,$row_id)
    {
        $trans = DB::table('translations')
                        ->where('row_id', $row_id)
                        ->where('column', $column)
                        ->update(['translation' => $translation]);
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $row_id)
    {
        $translations = DB::table('translations')
        ->where('row_id', $row_id);

        foreach($translations as $translation){
            DB::table('translations')->where('row_id', $row_id)->delete();
        }
        return;
    }
}
