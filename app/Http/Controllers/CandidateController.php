<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Candidate::with(['vision', 'mission'])->get();

        return view('scaffolds.candidates.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required',
            'number' => 'required|unique:candidates,number',
        ]);

        if ($validator->fails()) {
            Alert::toast('Oops, Something Went Wrong!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Candidate::create([
                'image' => 'image_' . Carbon::now()->format('Ymd_His') . '.jpg',
                'name' => $request->name,
                'number' => $request->number,
            ]);

            $request->file('image')->move(storage_path('app/public/images'), 'image_' . Carbon::now()->format('Ymd_His') . '.jpg');

            Alert::toast('Data Saved Successfully!', 'success');
            return redirect()->route('candidates.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        $data = $candidate;

        return view('scaffolds.candidates.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required',
            'number' => 'required',
        ]);

        // dd($request->all());

        if ($validator->fails()) {
            Alert::toast('Oops, Something Went Wrong!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $candidate->update([
                'name' => $request->name,
                'number' => $request->number,
            ]);

            if ($request->file('image')) {
                Storage::delete('public/images/' . $request->old_image);

                $request->file('image')->move(storage_path('app/public/images'), 'image_' . Carbon::now()->format('Ymd_His') . '.jpg');
                $candidate->update(['image' => 'image_' . Carbon::now()->format('Ymd_His') . '.jpg']);
            }

            Alert::toast('Data Saved Successfully!', 'success');
            return redirect()->route('candidates.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        Alert::toast('Data Deleted Successfully!', 'success');
        return redirect()->route('candidates.index');
    }

    /* VISION SECTION */

    /**
     * Show the form for creating a new resource.
     */
    public function vision()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function visionStore()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function visionDestroy()
    {
        //
    }

    /* MISSION SECTION */

    /**
     * Show the form for creating a new resource.
     */
    public function mission()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function missionStore()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function missionDestroy()
    {
        //
    }
}
