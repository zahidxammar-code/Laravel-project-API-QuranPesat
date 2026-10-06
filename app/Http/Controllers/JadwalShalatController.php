<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class JadwalShalatController extends Controller
{
    private string $base = 'https://equran.id/api/v2/shalat';

    public function index()
    {
        $provinsi = Cache::remember('shalat_provinsi', 86400, function () {
            return Http::get("{$this->base}/provinsi")->json('data') ?? [];
        });

        return view('jadwal', compact('provinsi'));
    }

    public function kabkota(Request $request)
    {
        $request->validate(['provinsi' => 'required|string']);

        $data = Cache::remember('shalat_kabkota_' . md5($request->provinsi), 86400, function () use ($request) {
            return Http::post("{$this->base}/kabkota", [
                'provinsi' => $request->provinsi,
            ])->json('data') ?? [];
        });

        return response()->json($data);
    }

    public function jadwal(Request $request)
    {
        $request->validate([
            'provinsi' => 'required|string',
            'kabkota'  => 'required|string',
        ]);

        $bulan = (int) now()->format('n');
        $tahun = (int) now()->format('Y');

        $res = Http::post($this->base, [
            'provinsi' => $request->provinsi,
            'kabkota'  => $request->kabkota,
            'bulan'    => $bulan,
            'tahun'    => $tahun,
        ]);

        return response()->json($res->json('data'));
    }
}