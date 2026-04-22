<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubmissionRequest;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function upload()
    {
        return view('public.sign.upload');
    }

    public function store(StoreSubmissionRequest $request)
    {
        // File handling will be done by FileUploadService
        return response()->json(['success' => true]);
    }
}