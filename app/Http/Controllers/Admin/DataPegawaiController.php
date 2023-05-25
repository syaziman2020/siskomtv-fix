<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;
use App\Models\DataPegawai;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $items = DataPegawai::all();
        return view('pages.admin.data-pegawai.index', ['items' => $items]);
    }

    public function store(PegawaiRequest $request)
    {
        //
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/data-pegawai', 'public');
        DataPegawai::create($data);

        return redirect(route('data-pegawai.index'))->with('success', 'Data success added');
    }

    public function create()
    {
        return view('pages.admin.data-pegawai.create');
    }

    public function destroy($id)
    {
        //
        $item = DataPegawai::findOrFail($id);
        $item->delete();
        return redirect(route('data-pegawai.index', compact('item')))->with('success', 'Data success deleted');
    }

    public function edit($id)
    {
        //
        $item = DataPegawai::findOrFail($id);
        return view('pages.admin.data-pegawai.edit', [
            'item' => $item,
        ]);
    }

    public function update(PegawaiRequest $request, $id)
    {
        //
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/data-pegawai', 'public');

        $item = DataPegawai::findOrFail($id);

        $item->update($data);

        return redirect(route('data-pegawai.index', compact('item')))->with('success', 'Data success updated');
    }
}
