<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'age',
    ];
    public static function getTeacher(){
        $teacher =  SELF::orderBy('created_at','desc');

        return DataTables::of($teacher)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
	}

    public static function createTeacher($data){

        $teacher = new Teacher();
        $teacher->name  = $data->name;
        $teacher->age   = $data->age;

        return $teacher->save();
    }

    public static function getTeacherData($id){
        return SELF::find($id);
    }
    public static function updateTeacher($data){

        $teacher = SELF::find($data->teacher_id);
        $teacher->name  = $data->name;
        $teacher->age   = $data->age;

        return $teacher->save();
    }
    public static function deleteTeacher($data){

        $value = SELF::find($data->id);
         if($value){
             $value->delete();
             return true;
         }
         else
             return false;
    }
    public function getAllCount(){

        return  SELF::count();
    }
}
