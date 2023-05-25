<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    //

    // public function all(Request $request)
    // {

    //     $status = $request->input('status');

    //     if ($id) {
    //         $category = ProductCategory::with(['products'])->find($id);

    //         if ($category) {
    //             return ResponseFormatter::success($category, 'Data kategori berhasil diambil');
    //         } else {
    //             return ResponseFormatter::error(null, 'Data kategori tidak ada', 404);
    //         }
    //     }
    //     $category = ProductCategory::query();

    //     if ($name) {
    //         $category->where('name', 'like', '%' . $name . '%');
    //     }
    //     if ($show_product) {
    //         $category->with('products');
    //     }

    //     return ResponseFormatter::success($items, 'Data Status Berhasil Diperoleh');
    // }
    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data profile user berhasil diambil');
    }
    public function updateStatus(Request $request, $id)
    {
        $data = $request->all();

        $item = DataPegawai::findOrFail($id);

        $item->update($data);

        return ResponseFormatter::success($item, 'Change Status Success');
    }
}
