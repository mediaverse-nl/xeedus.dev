<?php

namespace App\Http\Controllers;

use App\Video;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function find(Request $request)
    {
        $query = $request->get('q');

        return Video::where('name', 'like', "%{$query}%")->where('status', 'public')->get();
    }
}
