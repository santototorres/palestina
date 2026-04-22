<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopRequestRequest;
use App\Models\ShopRequest;

class ShopController extends Controller
{
    public function index()
    {
        return view('public.shop.index');
    }

    public function request()
    {
        return view('public.shop.request');
    }

    public function store(StoreShopRequestRequest $request)
    {
        // Handling WhatsApp redirection on the frontend, this just logs it
        $req = ShopRequest::create($request->safe()->except('items'));
        foreach($request->validated('items') as $item) {
            $req->items()->create($item);
        }
        return response()->json(['success' => true]);
    }
}