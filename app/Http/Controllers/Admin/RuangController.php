<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RuangDosenRequest;
use App\Models\RuangDosen;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index()
    {
        //
        $id = 1;
        $item = RuangDosen::findOrFail($id);
        return view('pages.admin.ruang-dosen.edit', [
            'item' => $item,
        ]);
    }

    public function update(RuangDosenRequest $request, $id)
    {

        $data = $request->all();

        $item = RuangDosen::findOrFail($id);

        $item->update($data);

        return redirect(route('ruang-dosen.index', compact('item')))->with('success', 'Data success updated');
    }
}
