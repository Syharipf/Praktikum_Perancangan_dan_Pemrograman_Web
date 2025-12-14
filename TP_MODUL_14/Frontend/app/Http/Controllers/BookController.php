<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index()
    {
        $response = Http::get(config('services.book_api.url'));
        $books = $response->json();

        return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        Http::post(config('services.book_api.url'), [
            'name' => $request->name,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'rating' => $request->rating
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $response = Http::get(config('services.book_api.url'));
        $books = collect($response->json());
        $book = $books->firstWhere('id', $id);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        Http::put(config('services.book_api.url') . '/' . $id, [
            'name' => $request->name,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'rating' => $request->rating
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        Http::delete(config('services.book_api.url') . '/' . $id);
        return redirect()->back();
    }
}
