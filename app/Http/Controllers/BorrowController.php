<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowFormRequest;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function show()
    {
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        $borrows = Borrow::all();
        return view('borrows/list', [
            'borrows' => $borrows
        ]);
    }

    public function edit(Borrow $borrow)
    {
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        return view('borrows.edit', [
            'borrow' => $borrow
        ]);
    }

    public function update(Borrow $borrow, BorrowFormRequest $request)
    {
        $validated_data = $request->validated();
        $borrow->update($validated_data);
        return redirect()->route('borrows.list');
    }
}