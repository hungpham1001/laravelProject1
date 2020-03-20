<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\category;
class categoriesQuery extends Controller
{
    public function showAll(Request $request){
        $categories = \App\category::all();
        $page = \App\category::paginate(10);
        $parent = \App\category::where('parent','=',null)->get();
        $child = \App\category::find(1)->child;
        $arr = array('categories'=>$categories,'page'=>$page,'parent'=>$parent);
        $status = $request->session()->pull('status','');
        return view('main',['arr'=>$arr,'status'=>$status]);
    }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->input('id'))){
            try {
                $category = category::find($request->input('id'));
                $category->parent = $request->input('parent');
                $category->categories = $request->input('categories');
                $category->save();
                return response()->json([
                    'error' => false,
                    'message'  => 'update success',
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'error' => true,
                    'message'  => 'Category already exist (update)',
                ], 200);
            }
        } else{
            try {
                $newCategory = new category;
                $newCategory->parent = $request->input('parent');
                $newCategory->categories = $request->input('categories');
                $newCategory->save();
                return response()->json([
                    'error'=> false,
                    'message'=>'Category saved'
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'error'=> true,
                    'message'=>'Category already exist'
                ], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array(
            'parent'=>'required',
            'categories'=>'required'
        ));
        if($validator->fails()){
            return response()->json([
                'error'=> true,
                'message'=> $validator->errors(),
            ], 422);
        }
        try {
            $category = category::find($id);
            $category->parent = $request->input('parent');
            $category->categories = $request->input('categories');
            $category->save();
            return response()->json([
                'error' => false,
                'message'  => 'update success',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message'  => 'Category already exist',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::destroy($id);
        return response()->json([
            'error'=>false,
            'message'=>'Deleted!'
        ], 200);
    }
}
