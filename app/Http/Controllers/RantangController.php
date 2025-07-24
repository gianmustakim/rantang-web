<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rantang;

class RantangController extends Controller
{
    public function index(Request $request)
    {
        $query = Rantang::query();

        // Enhanced search functionality with more flexibility
        if ($search = $request->get('search')) {
            // Convert search term to lowercase and split into words
            $searchWords = explode(' ', strtolower($search));

            // Build a more flexible search query
            $query->where(function($q) use ($searchWords) {
                foreach ($searchWords as $word) {
                    if (strlen($word) >= 2) { // Only search for words longer than 1 character
                        $q->where(function($subQ) use ($word) {
                            // Search in kode_rantang (case-insensitive)
                            $subQ->whereRaw('LOWER(kode_rantang) LIKE ?', ['%' . $word . '%'])
                                // Search in lokasi_terakhir (case-insensitive)
                                ->orWhereRaw('LOWER(lokasi_terakhir) LIKE ?', ['%' . $word . '%'])
                                // Search in pemegang_terakhir (case-insensitive)
                                ->orWhereRaw('LOWER(pemegang_terakhir) LIKE ?', ['%' . $word . '%'])
                                // Search in kondisi (case-insensitive)
                                ->orWhereRaw('LOWER(kondisi) LIKE ?', ['%' . $word . '%']);
                        });
                    }
                }
            });
        }

        // Filter by kondisi
        if ($kondisi = $request->get('kondisi')) {
            $query->where('kondisi', $kondisi);
        }

        // Get all records with search/filter applied
        $rantangs = $query->get();

        // Get unique kondisi values for filter dropdown
        $kondisiList = Rantang::distinct()->pluck('kondisi')->sort()->values()->toArray();

        return view('rantang.index', compact('rantangs', 'kondisiList'));
    }

    /**
     * Update the specified rantang in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_rantang' => 'required|string|max:255',
            'lokasi_terakhir' => 'required|string|max:255',
            'pemegang_terakhir' => 'required|string|max:255',
            'kondisi' => 'required|string|max:255',
        ]);

        $rantang = Rantang::findOrFail($id);
        $rantang->update($validated);

        return redirect()->route('rantang.index')->with('success', 'Rantang berhasil diperbarui');
    }
}
