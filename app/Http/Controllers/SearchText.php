<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Contracts\View\View;
use App\Repository\SearchRepository;

class SearchText extends Controller
{
    function showForm(): View
    {
        return view('search');
    }

    function search(SearchRequest $request, SearchRepository $searchRepository): String
    {
        $validated = $request->validated();

        $datas = $searchRepository->search($validated);

        return view('show-data', compact('datas', 'validated'))->render();
    }
}
