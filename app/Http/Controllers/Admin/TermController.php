<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermAdd;
use App\Http\Requests\Admin\TermUpdate;
use App\Models\Term;
use Exception;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.term.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.term.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermAdd $request)
    {
        try{
            $save= Term::createTerm($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/term',
                ];
            }else{
                $response=[
                    'status'=>false,
                    'message'=>'Something wrong please try again.',
                ];
            }

        }catch(Exception $e){
            $response=[
                'status'=>false,
                'message'=>'Something went wrong please try again.',
                'error'=>$e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\term  $term
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $getterm = Term::getTerm();
        return $getterm;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Term::getTermData($id);
        if(!$data){
            abort(404);
        }
        return view('admin.term.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(TermUpdate $request, $id)
    {
        try{
            $save= Term::updateTerm($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/term',
                ];
            }else{
                $response=[
                    'status'=>false,
                    'message'=>'Something wrong please try again.',
                ];
            }

        }catch(Exception $e){
            $response=[
                'status'=>false,
                'message'=>'Something went wrong please try again.',
                'error'=>$e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Term::deleteTerm($request);
        return response()->json($delete);
    }
}
