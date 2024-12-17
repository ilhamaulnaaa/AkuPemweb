<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\book_issue;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function books()
    {
        $books = book::where('status', 'Y')->get();
        return view('user.books', compact('books'));
    }

    public function borrow(Request $request, book $book)
    {
        // Check if the book is available
        if ($book->status != 'Y') {
            return redirect()->back()->with('error', 'Book is not available.');
        }

        // Create a new book issue
        book_issue::create([
            'student_id' => Auth::id(),
            'book_id' => $book->id,
            'issue_date' => now(),
            'return_date' => now()->addDays(14), // Example: 2 weeks
            'issue_status' => 'N',
        ]);

        // Update book status
        $book->update(['status' => 'N']);

        return redirect()->route('user.books')->with('success', 'Book borrowed successfully.');
    }
}
