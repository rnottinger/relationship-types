<?php

namespace App\Http\Controllers;

use App\Math;
use Brick\Math\BigDecimal;
use Brick\Math\BigInteger;
use Brick\Math\BigRational;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MathController extends Controller {
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
     * @param  \App\Math  $math
     * @return \Illuminate\Http\Response
     */
    public function show(Math $math) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Math  $math
     * @return \Illuminate\Http\Response
     */
    public function edit(Math $math) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Math  $math
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Math $math) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Math  $math
     * @return \Illuminate\Http\Response
     */
    public function destroy(Math $math) {
        //
    }

    public function instantiation() {
        // dump(BigInteger::of(123546));
        // Log::info(BigInteger::of(123546));
        Log::info(BigInteger::of(123546));
        Log::info(BigInteger::of(9999999999999999999999999999999999999999999));

        Log::info(BigDecimal::of(1.2));
        Log::info(BigDecimal::of('9.99999999999999999999999999999999999999999999'));

        Log::info(BigRational::of('2/3'));
        Log::info(BigRational::of('1.1'));

        return 'done';
    }
}
