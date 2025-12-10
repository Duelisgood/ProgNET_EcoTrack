<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // <-- PENTING
use App\Mail\ReportStatusUpdated;    // <-- PENTING

class AdminController extends Controller
{
    // 1. Menampilkan Semua Laporan Masuk
    public function index()
    {
        // KEAMANAN: Cek apakah yang login adalah Admin?
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Ambil semua laporan, urutkan terbaru, dan ikutkan data user-nya (biar tau siapa yang lapor)
        $reports = Report::with('user')->latest()->get();

        return view('admin.dashboard', compact('reports'));
    }

    // 2. Mengupdate Status Laporan
    public function update(Request $request, Report $report)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        // Validasi input status
        $request->validate([
            'status' => 'required|in:pending,process,completed',
        ]);

        // Update database
        $report->update([
            'status' => $request->status
        ]);
        try {
            Mail::to($report->user->email)->send(new ReportStatusUpdated($report));
        } catch (\Exception $e) {
        }

        return redirect()->back()->with('success', 'Status diperbarui & Notifikasi email dikirim!');
    }
}