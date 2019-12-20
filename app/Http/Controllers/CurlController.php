<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Symfony\Component\Console\Input\Input;

class CurlController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */

     //get method
    public function getCurl(){
        $url = 'https://api.themoviedb.org/3/discover/movie?api_key=8a9be9d05bd9f9d5ca154aaf42504303&language=en-US';
        $response=Curl::to($url)->get();
        dd($response);
    }

    //post method
    public function postCurl(){
        $url = 'https://jsonplaceholder.typicode.com/posts';
        $response = Curl::to($url)->withData([
            'title' => 'Alfara',
            'body' => 'Alfara Nafi Dinara',
            'userId' => 22
        ])->post();
        dd($response);
    }

    //put method
    public function putCurl(){
        $url = 'https://jsonplaceholder.typicode.com/posts/1';
        $response = Curl::to($url)->withData([
            'title' => 'Alfara ubah',
            'body' => 'Alfara Nafi Dinara ubah',
            'userId' => 23
        ])->put();
        dd($response);
}

    //patch ,ethod
    public function patchCurl(){
        $url = 'https://jsonplaceholder.typicode.com/posts/1';
        $response = Curl::to($url)->withData([
            'title' => 'Alfara ubah',
            'body' => 'Alfara Nafi Dinara ubah',
            'userId' => 24
        ])->patch();
        dd($response);
}

    //delete method
    public function deleteCurl(){
        $url = 'https://jsonplaceholder.typicode.com/posts/1';
        $response=Curl::to($url)->delete();
        dd($response);
    }

    public function send(Request $request){
        $query = $request->data;
        $query = $request->input('query', $request->value);
        $url = 'https://api.themoviedb.org/3/search/movie?api_key=8a9be9d05bd9f9d5ca154aaf42504303&language=en-US&query='.$query;
        $news = Curl::to($url)
        ->asJson()
        ->get();
            $succes=[
                'data' => $news
            ];

            return response()->json($succes,201);
    }
}