<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use App\Models\SearchKeyWord;
use App\Models\SearchLog;


class SearchMidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse | array
    {
        //
        $search = $request->query("search");

        $searchKeyWords = SearchKeyWord::where("search_term", "$search")->get("key_word");

        if (count($searchKeyWords) === 0) {
            SearchKeyWord::create(['search_term' => $search, 'key_word' => $search]);
            $searchKeyWords[] = ['key_word' => $search];
        }

        SearchLog::create(['search_term' => $search]);


        $queryUrl = env('WP_BASE_URL', 'https://nagp.alexsilvapro.com.br/wp-json/wp/v2/') . 'posts/?search=' . $searchKeyWords[0]['key_word'];

        $response = Http::get($queryUrl);

        error_log('Performed Query: ' . $queryUrl);

        return $response->json(); //response()->json(['search' => $search, 'result' => $searchKeyWords], Response::HTTP_OK);
    }

    public function fetchByCategory(string $id): JsonResponse | array
    {

        $queryUrl = env('WP_BASE_URL', 'https://nagp.alexsilvapro.com.br/wp-json/wp/v2/') . 'posts?categories=' . $id;

        $response = Http::get($queryUrl);

        return $response->json();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
