<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'age',
        'gender',
        'teacher_id',
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public static function getStudent(){
        $student =  SELF::orderBy('created_at','desc');

        return DataTables::of($student)
                ->addIndexColumn()
                ->editColumn('teacher_name', function (Student $student) {
                    return $student->teacher->name ?? null;
                })
                ->rawColumns(['action'])
                ->make(true);
	}

    public static function createStudent($data){

        $student = new Student();
        $student->name  = $data->name;
        $student->age   = $data->age;
        $student->gender   = $data->gender;
        $student->teacher_id   = $data->teacher_id;

        return $student->save();
    }

    public static function getStudentData($id){
        return SELF::with('teacher')->find($id);
    }
    public static function updateStudent($data){

        $student = SELF::find($data->student_id);
        $student->name  = $data->name;
        $student->age   = $data->age;
        $student->gender   = $data->gender;
        $student->teacher_id   = $data->teacher_id;
        return $student->save();
    }
    public static function deleteStudent($data){

        $value = SELF::find($data->id);
         if($value){
             $value->delete();
             return true;
         }
         else
             return false;
    }
    public function getTeacherList($data){

        $list = Teacher::select('name as text','id')
        -> where('name', 'like', "%$data->q%")
        -> limit(5)
        -> get();

        return $list;
    }
    public function getTermList($data){

        $list = Term::select('name as text','id')
        -> where('name', 'like', "%$data->q%")
        -> limit(5)
        -> get();

        return $list;
    }
    public function getStudentList($data){

        $list = Student::select('name as text','id')
        -> where('name', 'like', "%$data->q%")
        -> limit(5)
        -> get();

        return $list;
    }
    public function getAllCount(){

        return  SELF::count();
    }
}
