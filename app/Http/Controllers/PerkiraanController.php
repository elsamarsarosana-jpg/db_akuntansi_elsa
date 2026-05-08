<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkiraan;

class PerkiraanController extends Controller
{
    public function index()
    {
        $data = Perkiraan::all();
        return view('perkiraan.index', compact('data'));
    }

    public function create()
    {
        return view('perkiraan.create');
    }

    public function store(Request $request)
    {
        Perkiraan::create($request->all());

        return redirect('/perkiraan');
    }

    public function edit($id)
    {
        $perkiraan = Perkiraan::findOrFail($id);
        return view('perkiraan.edit', compact('perkiraan'));
    }

    public function update(Request $request, $id)
    {
        $perkiraan = Perkiraan::findOrFail($id);
        $perkiraan->update($request->all());

        return redirect('/perkiraan');
    }

    public function destroy($id)
    {
        $perkiraan = Perkiraan::findOrFail($id);
        $perkiraan->delete();

        return redirect('/perkiraan');
    }
}
