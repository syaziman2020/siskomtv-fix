<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use App\Models\RuangDosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->roles == 'ADMIN') {
            $item = RuangDosen::first();
            $user = Auth::user();
            // $relation = User::with('pegawai')->where('id', $user->id)->first();

            $data = DataPegawai::count();
            $any_data = DataPegawai::where('status', 'ADA')->count();
            $not_any_data = DataPegawai::where('status', 'TIDAK ADA')->count();
            $study_data = DataPegawai::where('status', 'TUGAS BELAJAR')->count();
            $holiday_data = DataPegawai::where('status', 'LIBUR')->count();

            return view('pages.admin.dashboard', [
                'item' => $item,
                'data' => $data,
                'anyData' => $any_data,
                'notAny' => $not_any_data,
                'studyData' => $study_data,
                'holidayData' => $holiday_data,
                'user' => $user
            ]);
        }
        Auth::logout();

        return redirect()->route('home');
    }
}
