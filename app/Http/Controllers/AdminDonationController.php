<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Donation;

class AdminDonationController extends Controller
{
    public function index()
    {
        $donations = Donation::latest()->get();

        return view('admin.donations.index', compact('donations'));
    }
}

