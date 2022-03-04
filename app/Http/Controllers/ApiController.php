<?php

namespace App\Http\Controllers;

use App\Models\Books;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index($field = null, $arg = null)
    {
        if ($arg) {
            $books = Books::where($field, "like", "%$arg%")->get();
        } else {
            $books = Books::all();
        }
        return response()->json($books);
    }

    public static function store($data)
    {
        Books::create($data);
    }

    public function welcome()
    {
        $books = Books::all();
        $books = json_decode($books, true);
        return view("welcome", ["books" => $books]);
    }

    public static function printData($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    ApiController::printData($value);
                } else {
                    echo $value;
                    break;
                }
            }
        } else {
            echo $data;
        }
    }

    public function search(Request $request)
    {
        $arg = $request->inputSearch;
        $field = $request->inputOption;
        if ($arg) {
            $books = Books::where($field, "like", "%$arg%")->get();
        } else {
            $books = Books::all();
        }
        $books = json_decode($books, true);
        return view("welcome", ["books" => $books]);
    }
}
