<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Object_;

class TesApiController extends Controller
{
    public function index(){
        $response = Http::get('https://api.publicapis.org/entries');
 
        $anu = (object)$response->json();

        dd($anu->entries);
    }
}
