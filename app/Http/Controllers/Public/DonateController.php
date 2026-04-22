<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;

class DonateController extends Controller
{
    public function index()
    {
        return view('public.donate');
    }
}