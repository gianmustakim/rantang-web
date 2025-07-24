<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rantang;

class InputController extends Controller
{
    /**
     * Show the form for editing a rantang
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rantang = Rantang::findOrFail($id);
        return view('input.index', compact('rantang'));
    }
}
