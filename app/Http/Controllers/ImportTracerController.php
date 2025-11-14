<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class ImportTracerController extends Controller
{
    public function store(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:10240', // max 10MB
        ]);

        // Hapus data lama agar tidak dobel
        Data::truncate();

        // Buka file CSV
        $file = $request->file('file');
        $handle = fopen($file, 'r');
        $isHeader = true;

        // Baca baris CSV
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            if ($isHeader) {
                $isHeader = false; // lewati header
                continue;
            }

            // Misalnya CSV: category,value
            Data::create([
                'category' => $row[0],
                'value' => (int)$row[1],
            ]);
        }

        fclose($handle);

        return redirect()->back()->with('success', 'Data Tracer berhasil diimpor!');
    }
}