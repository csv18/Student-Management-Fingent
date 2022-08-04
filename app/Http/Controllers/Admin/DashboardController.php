<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Term;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_students = Student::getAllCount();
        $total_teachers = Teacher::getAllCount();
        $total_terms = Term::getAllCount();
        return view('admin.dashboard.index',compact('total_students','total_teachers','total_terms'));
    }
}
