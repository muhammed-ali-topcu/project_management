<?php

namespace App\Http\Controllers;

use App\TestTranslatable;
use Illuminate\Http\Request;

class TestTranslatableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $test = new TestTranslatable;
        $test->setTranslation('name','tr','isim');
        $test->setTranslation('name','en','name');

//        dd(compact('test'));
        app()->setlocale('en');
        app()->setlocale('tr');
        return $test->name;
        return view('testTranslatable\index',compact('test'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestTranslatable  $testTranslatable
     * @return \Illuminate\Http\Response
     */
    public function show(TestTranslatable $testTranslatable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestTranslatable  $testTranslatable
     * @return \Illuminate\Http\Response
     */
    public function edit(TestTranslatable $testTranslatable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestTranslatable  $testTranslatable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestTranslatable $testTranslatable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestTranslatable  $testTranslatable
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestTranslatable $testTranslatable)
    {
        //
    }
}
