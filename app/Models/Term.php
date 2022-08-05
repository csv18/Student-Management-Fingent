<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class Term extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'terms';

    protected $fillable = [
        'name'
    ];
    public static function getTerm(){
        $term =  SELF::orderBy('created_at','desc');

        return DataTables::of($term)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
	}

    public static function createTerm($data){

        $term = new Term();
        $term->name  = $data->name;

        return $term->save();
    }

    public static function getTermData($id){
        return SELF::find($id);
    }
    public static function updateTerm($data){

        $term = SELF::find($data->term_id);
        $term->name  = $data->name;

        return $term->save();
    }
    public static function deleteTerm($data){

        $value = SELF::find($data->id);
         if($value){
             $value->delete();
             return true;
         }
         else
             return false;
    }
}
