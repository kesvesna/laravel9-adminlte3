<?php

namespace App\Http\Controllers\Admin\SpareParts;

use App\Http\Controllers\Controller;
use App\Models\SpareParts\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.spare_parts.index', [
            'spare_parts' => SparePart::paginate(config('admin.spare_parts.pagination')),
            'spare_parts_count' => SparePart::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spare_parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'sort_order' => ['integer']
        ]);
        SparePart::create($data);
        return redirect()->route('admin.spare_parts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpareParts\SparePart  $spare_part
     * @return \Illuminate\Http\Response
     */
    public function show(SparePart $spare_part)
    {
        return view('admin.spare_parts.show',[
            'spare_part' => $spare_part
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpareParts\SparePart  $spare_part
     * @return \Illuminate\Http\Response
     */
    public function edit(SparePart  $spare_part)
    {
        return view('admin.spare_parts.edit', [
            'spare_part' => $spare_part
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpareParts\SparePart  $spare_part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SparePart  $spare_part)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'sort_order' => ['integer']
        ]);
        $spare_part->update($data);
        return redirect()->route('admin.spare_parts.show', $spare_part->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpareParts\SparePart  $spare_part
     * @return \Illuminate\Http\Response
     */
    public function destroy(SparePart  $spare_part)
    {
        $spare_part->delete();
        return redirect()->route('admin.spare_parts.index');
    }
}
