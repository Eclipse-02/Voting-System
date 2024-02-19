<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class SelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (auth()->user()->is_admin == 1) {
        //     return redirect()->route('home');
        // }
        if (auth()->user()->vote_num != null) {
            return view('scaffolds.selections.success');
        }
        $data = Candidate::with(['vision', 'mission'])->get();

        return view('scaffolds.selections.index', compact('data'));
    }

    /**
     * 
     */
    public function success()
    {
        return view('scaffolds.selections.success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::where('id', auth()->user()->id)->update([
            'vote_num' => $request->vote_num
        ]);

        return redirect()->route('selections.success');
    }
}
