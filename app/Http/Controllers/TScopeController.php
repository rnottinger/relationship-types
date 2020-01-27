<?php

namespace App\Http\Controllers;

use App\TScope;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TScopeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TScope  $tScope
     * @return \Illuminate\Http\Response
     */
    public function show(TScope $tScope) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TScope  $tScope
     * @return \Illuminate\Http\Response
     */
    public function edit(TScope $tScope) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TScope  $tScope
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TScope $tScope) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TScope  $tScope
     * @return \Illuminate\Http\Response
     */
    public function destroy(TScope $tScope) {
        //
    }

    public function examples() {
        // dump(BigInteger::of(123546));
        Log::info(BigInteger::of(123546));
        return 'boom';
    }
}
