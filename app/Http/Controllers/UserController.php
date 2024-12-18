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
        if ($book->status != 'Y') {
            return redirect()->back()->with('error', 'Book is not available.');
        }

        book_issue::create([
            'student_id' => Auth::id(),
            'book_id' => $book->id,
            'issue_date' => now(),
            'return_date' => now()->addDays(14),
            'issue_status' => 'N',
        ]);

        $book->update(['status' => 'N']);

        return redirect()->route('user.home')->with('success', 'Book borrowed successfully.');
    }
    
    public function home()
    {
        $books = book::where('status', 'Y')->get();
        return view('public.homepage', compact('books'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = book::where('name', 'LIKE', "%$query%")
        ->orWhereHas('category', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })
            ->where('status', 'Y')
            ->get();
        return view('public.homepage', compact('books'));
    }

    public function myBooks()
    {
        $bookIssues = book_issue::where('student_id', Auth::id())
            ->with('book')
            ->get();

        return view('public.my_books', compact('bookIssues'));
    }

    public function returnBook($id)
    {
        $bookIssue = book_issue::findOrFail($id);
        if ($bookIssue->student_id != Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $bookIssue->update([
            'issue_status' => 'Y',
            'return_day' => now(),
        ]);

        $bookIssue->book->update(['status' => 'Y']);

        return redirect()->route('user.myBooks')->with('success', 'Book returned successfully.');
    }
}
