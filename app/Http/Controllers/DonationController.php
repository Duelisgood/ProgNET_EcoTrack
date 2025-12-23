<?php

namespace App\Http\Controllers;


use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return view('donation.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:100',
            'amount' => 'required|numeric|min:1000',
        ]);

        Donation::create([
            'donor_name' => $request->donor_name,
            'amount' => $request->amount,
        ]);

        return redirect()->back()->with('Donasi Terkirim! Terima kasih atas dukungan Anda.');
    }
}
