<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Penting untuk upload file

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120', // Maks 5MB
        ]);

        // 2. Proses Upload Foto
        if ($request->hasFile('foto')) {
            // Simpan ke folder: storage/app/public/reports
            $path = $request->file('foto')->store('reports', 'public');
        }

        // 3. Simpan ke Database
        Report::create([
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
            'location' => $request->location,
            'description' => $request->description, // Pastikan form html pake name="description" bukan "keterangan"
            'image_path' => $path,
            'status' => 'pending',
        ]);

        // 4. Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }

    // HAPUS LAPORAN (BATALKAN)
    public function destroy(Report $report)
    {
        // 1. Keamanan: Pastikan yang menghapus adalah Pemilik Laporan
        if ($report->user_id !== Auth::id()) {
            abort(403, 'Anda tidak berhak menghapus laporan ini.');
        }

        // 2. Keamanan: Pastikan status masih 'pending'
        if ($report->status !== 'pending') {
            return redirect()->back()->with('error', 'Laporan yang sedang diproses tidak bisa dibatalkan.');
        }

        // 3. Hapus File Foto dari Penyimpanan (Storage)
        if ($report->image_path && Storage::disk('public')->exists($report->image_path)) {
            Storage::disk('public')->delete($report->image_path);
        }

        // 4. Hapus Data dari Database
        $report->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dibatalkan dan dihapus.');
    }
    
}