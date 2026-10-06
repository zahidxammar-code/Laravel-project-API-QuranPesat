<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http; 
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Http::get('https://dummyjson.com/quotes');
        if($quotes->successful()){
            $quotes = $quotes->json()['quotes'];
          $singleQuote = $quotes[array_rand($quotes)];
        }
        return view('welcome', ['quotes' => $singleQuote]);
    }

//     public function index()
// {
//     $response = Http::get('https://dummyjson.com/quotes');
    
//     if ($response->successful()) {
//         // Ambil data JSON dan ubah menjadi array PHP
//         $quotesData = $response->json(); 
        
//         // Oper array 'quotes' ke halaman welcome
//         return view('welcome', ['quotes' => $quotesData['quotes']]);
//     }
    
//     // Jika API error, oper array kosong agar halaman tidak crash
//     return view('welcome', ['quotes' => []]);
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
