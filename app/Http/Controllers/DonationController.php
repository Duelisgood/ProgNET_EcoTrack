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
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|integer|min:1000',
            'payment_method' => 'required|in:gopay,dana,ovo,qris',
        ]);

        Donation::create([
            'donor_name' => $request->donor_name,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Terima kasih atas donasi Anda');
    }
}
