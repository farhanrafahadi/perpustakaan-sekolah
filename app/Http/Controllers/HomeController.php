<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function __invoke()
    {
        $popularBooks = Book::query()
            ->withCount([
                'borrows' => fn (Builder $query) => $query->where('confirmation', true),
            ])
            ->orderBy('borrows_count', 'desc')
            ->limit(6)
            ->get();
            
        $newestBooks = Book::query()
            ->select('id', 'title', 'writer', 'cover', 'created_at') // menambahkan writer
            ->latest('id')
            ->limit(6)
            ->get();

        // menambahkan view all
        $AllBooks = Book::query()
            ->select('id', 'title', 'writer', 'cover', 'created_at')
            ->latest('id')
            ->get();
        // end

        return view('home')->with([
            'popularBooks' => $popularBooks,
            'newestBooks' => $newestBooks,
            'allBooks' => $AllBooks,
        ]);
    }
}
