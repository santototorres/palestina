<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\VolunteerLead;

class VolunteerController extends Controller
{
    public function index()
    {
        return view('public.volunteer');
    }

    public function store(StoreVolunteerRequest $request)
    {
        VolunteerLead::create($request->validated());
        return response()->json(['success' => true]);
    }
}