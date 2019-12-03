<?php

namespace App\Http\Controllers;

use App\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Consultant::all();
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
        $consultant = Consultant::create($request->all());

        return response()->json($consultant, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function show(Consultant $consultant)
    {
        return $consultant;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultant $consultant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultant $consultant)
    {
        $consultant -> update($request ->all());

        $request response() -> json($consultant, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultant $consultant)
    {
        $consultant -> delete();

        return response()->json(null, 204);
    }
}
