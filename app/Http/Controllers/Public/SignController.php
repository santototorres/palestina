<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMailRequestRequest;
use App\Models\MailRequest;

class SignController extends Controller
{
    public function index()
    {
        return view('public.sign.index');
    }

    public function download()
    {
        return view('public.sign.download');
    }

    public function mailRequest()
    {
        return view('public.sign.mail-request');
    }

    public function storeMailRequest(StoreMailRequestRequest $request)
    {
        $data = $request->validated();
        $data['status'] = \App\Enums\MailRequestStatus::NEW;
        $data['ip_hash'] = hash('sha256', $request->ip());
        $data['user_agent'] = $request->userAgent();
        
        MailRequest::create($data);
        
        return response()->json(['success' => true]);
    }
}