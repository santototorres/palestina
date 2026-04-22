<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }

    public function store(StoreContactRequest $request)
    {
        ContactMessage::create($request->validated());
        return response()->json(['success' => true]);
    }
}