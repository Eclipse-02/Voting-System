<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Candidate;
use App\Models\Mission;
use App\Models\Vision;
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

        return view('scaffolds.candidates.index', compact('data'))
                ->with('m', 0)
                ->with('n', 0);
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
    public function vision($candidate)
    {
        $data = Candidate::where('id', $candidate)->first();
        $visions = Vision::where('candidate_id', $candidate)->get();

        return view('scaffolds.visions.index', compact('data', 'visions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function visionStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desc' => 'array',
            'desc.0' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::toast('Oops, Something Went Wrong!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            foreach ($request->desc as $key => $value) {
                if ($value == null) {
                    # code...
                } else {
                    Vision::updateOrCreate([
                        'candidate_id' => $request->candidate_id,
                        'id' => $request->id
                    ],
                    [
                        'vsn_sq_no' => $key + 1,
                        'desc' => $value,
                    ]);
                }
            }

            Alert::toast('Data Saved Successfully!', 'success');
            return redirect()->route('candidates.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function visionDestroy($candidate, Vision $vision)
    {
        $vision->delete();

        Alert::toast('Data Deleted Successfully!', 'success');
        return redirect()->route('candidates.index');
    }

    /* MISSION SECTION */

    /**
     * Show the form for creating a new resource.
     */
    public function mission($candidate)
    {
        $data = Candidate::where('id', $candidate)->first();
        $missions = Mission::where('candidate_id', $candidate)->get();

        return view('scaffolds.missions.index', compact('data', 'missions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function missionStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desc' => 'array',
            'desc.0' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::toast('Oops, Something Went Wrong!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            foreach ($request->desc as $key => $value) {
                if ($value == null) {
                    # code...
                } else {
                    Mission::updateOrCreate([
                        'candidate_id' => $request->candidate_id,
                        'id' => $request->id
                    ],
                    [
                        'msn_sq_no' => $key + 1,
                        'desc' => $value,
                    ]);
                }
            }

            Alert::toast('Data Saved Successfully!', 'success');
            return redirect()->route('candidates.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function missionDestroy($candidate, Mission $mission)
    {
        $mission->delete();

        Alert::toast('Data Deleted Successfully!', 'success');
        return redirect()->route('candidates.index');
    }
}
