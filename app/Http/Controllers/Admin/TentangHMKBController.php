<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TentangHMKB;
use App\Http\Requests\Admin\TentangHMKBRequest;

class TentangHMKBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TentangHMKB::all();
        $count = TentangHMKB::count();
        return view('pages.admin.data-tentang-hmkb.index', [
            'items'=>$items, 'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.data-tentang-hmkb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TentangHMKBRequest $request)
    {
        $data = $request -> all();

        TentangHMKB::create($data);
        return redirect() -> route('tentang-hmkb.index');
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
        $item = TentangHMKB::findOrFail($id);

        return view('pages.admin.data-tentang-hmkb.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TentangHMKBRequest $request, $id)
    {
        $data = $request -> all();

        $item = TentangHMKB::findOrFail($id);
        $item -> update($data);

        return redirect() -> route('tentang-hmkb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TentangHMKB::findOrFail($id);
        $item -> delete($item);

        return redirect() -> route('tentang-hmkb.index');
    }
}
