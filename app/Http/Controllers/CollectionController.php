<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller {
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
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection) {
        //
    }

    public function links() {
        return view('collections.examples');
    }

    public function all() {
        //
        dump(collect([1, 2, 3])->all());
    }

    public function average() {
        dump(
            collect([1, 2, 3])->average()
        );
    }

    public function avg() {
        // $average = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');
        $average = collect([1, 1, 2, 4])->avg();
        dump(
            $average
        );
    }

    public function chunk() {
        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        $chunks = $collection->chunk(4);

        dump(
            $chunks->toArray()
        );
    }
}
