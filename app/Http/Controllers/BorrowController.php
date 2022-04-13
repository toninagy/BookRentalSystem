<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowFormRequest;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function show()
    {
        if(!Auth::user()->is_librarian) {
            $borrows = Borrow::where('reader_id','=',Auth::user()->id)->get();
            return view('borrows/list', [
                'borrows' => $borrows
            ]);
        }
        $borrows = Borrow::all();
        return view('borrows/list', [
            'borrows' => $borrows
        ]);
    }

    public function edit(Borrow $borrow)
    {
        $book = Book::where('id','=',$borrow->book_id)->get();
        $user = User::where('id','=',$borrow->reader_id)->get();
        return view('borrows.edit', [
            'borrow' => $borrow,
            'book' => $book,
            'user' => $user
        ]);
    }

    public function update(Borrow $borrow, BorrowFormRequest $request)
    {
        $validated_data = $request->validated();
        $now = Carbon::now();
        if($validated_data['status'] == 'ACCEPTED' || $validated_data['status'] == 'REJECTED') {
            $validated_data['request_processed_at'] = $now;
            $validated_data['request_managed_by'] = Auth::user()->id;
        }
        if($validated_data['status'] == 'RETURNED') {
            $validated_data['returned_at'] = $now;
            $validated_data['return_managed_by'] = Auth::user()->id;
        }
        $borrow->update($validated_data);
        if(!Auth::user()->is_librarian) {
            return redirect()->route('books.details', $borrow->book_id);
        }
        return redirect()->route('borrows.list');
    }
}
