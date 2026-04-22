<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function faq()
    {
        return view('public.faq');
    }

    public function resources()
    {
        return view('public.resources');
    }

    public function committee()
    {
        return view('public.committee');
    }
}