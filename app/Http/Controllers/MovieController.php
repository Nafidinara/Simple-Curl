<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'https://newsapi.org/v2/top-headlines?country=id&apiKey=9c4d313a235741b799db09047b450fd3';
        $news = Curl::to($url)
        ->asJson()
        ->get();
        
        $response=[
            $news
        ];

        return response()->json($response,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = $request->input('query');
        // $gambar_berita = $request->input('gambar_berita');
        // $deskripsi_berita = $request->input('deskripsi_berita');
        // $kategori_berita = $request->input('kategori_berita');

        $url = 'https://api.themoviedb.org/3/search/movie?api_key=8a9be9d05bd9f9d5ca154aaf42504303&language=en-US';
        $news = Curl::to($url)
        ->withData( array(
            'query' => $query,
        ) )
        ->asJson()
        ->post();

            $succes=[
                'msg' => 'news created!',
                'data' => $news
            ];

            return response()->json($succes,201);

        //return response()->json(['msg'=>'error'],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
