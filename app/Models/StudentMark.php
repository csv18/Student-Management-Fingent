<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class StudentMark extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'student_marks';

    protected $fillable = [
        'maths',
        'science',
        'history',
        'student_id',
        'term_id',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function term(){
        return $this->belongsTo(Term::class);
    }

    public static function getStudentMark(){
        $student =  SELF::orderBy('created_at','desc');

        return DataTables::of($student)
                ->addIndexColumn()
                ->editColumn('student_name', function (StudentMark $student) {
                    return $student->student->name ?? null;
                })
                ->editColumn('term_name', function (StudentMark $student) {
                    return $student->term->name ?? null;
                })
                ->rawColumns(['action'])
                ->make(true);
	}

    public static function createStudentMark($data){

        $student = new StudentMark();
        $student->maths  = $data->maths;
        $student->science   = $data->science;
        $student->history   = $data->history;
        $student->total_mark = ( $data->maths + $data->science + $data->history );
        $student->student_id   = $data->student_id;
        $student->term_id   = $data->term_id;

        return $student->save();
    }

    public static function getStudentMarkData($id){
        return SELF::with('student','term')->find($id);
    }
    public static function updateStudentMark($data){

        $student = SELF::find($data->student_mark_id);
        $student->maths  = $data->maths;
        $student->science   = $data->science;
        $student->history   = $data->history;
        $student->total_mark = ( $data->maths + $data->science + $data->history );
        $student->student_id   = $data->student_id;
        $student->term_id   = $data->term_id;
        return $student->save();
    }
    public static function deleteStudentMark($data){

        $value = SELF::find($data->id);
         if($value){
             $value->delete();
             return true;
         }
         else
             return false;
    }
}
