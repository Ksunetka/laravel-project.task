<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $applications = Application::where('user_id', $request->user()->id)->with('user')->orderBy('created_at', 'ASC')->get();
        return view('home', [
            'applications' => $applications
        ]);
    }

    public function save(ApplicationRequest $request)
    {
        $request->validated();
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('uploads', $file_name, 'public');
        Application::create([
           'name' => $request->name,
           'phone' => $request->phone,
           'message' => $request->message,
           'company' => $request->company,
           'file' => $file_name,
           'user_id' => $request->user()->id,
        ]);
        return redirect('home');
    }

    public function openFile($file) {
        $path = public_path('storage/uploads/'.$file);
        return response()->download($path);
    }
}
