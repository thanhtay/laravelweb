<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site/index');
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
