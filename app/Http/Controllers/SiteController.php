<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index($id)
    {
        print_r($_GET);
        print_r($id);
        return "Site Index";
    }

    public function read()
    {
        $request = new Request();
        d($request->method());
        v($request->isMethod('get'));
        d($request->input());
        d($request->query());
        d($request->filled('id'));
        v($request->has('id'));
        return "Site read";
    }

    public function about()
    {
        return view('site/about');
    }

    public function contact(Request $request)
    {
        // $request = new Request();
        $data = [
            'request' => $request,
        ];

        if ($request->isMethod('post')) {
            // dd($data);
        } else {
        }


        return view('site/contact', $data);
    }
}
