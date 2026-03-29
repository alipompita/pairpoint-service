<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DssCandidate;
use App\Models\DssOtherName;
use GrahamCampbell\ResultType\Success;

class DssCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dssCandidates = DssCandidate::with('otherNames')->get();
        return response()->json([
            "success" => true,
            "data" => $dssCandidates,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ident' => 'required|string|unique:dss_candidates,ident',
            'first_name' => 'nullable|string|max:64',
            'last_name' => 'nullable|string|max:64',
            'sex' => 'nullable|in:M,F',
            'dob' => 'nullable|date',
            'site' => 'required|in:1,2',
            'other_names' => 'nullable|string|max:225',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dssCandidate = DssCandidate::create([
            'ident' => $request->input('ident'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'sex' => $request->input('sex'),
            'dob' => $request->input('dob'),
            'site' => $request->input('site'),
            // 'other_names' => $request->input('other_names'),
        ]);

        if (isset($request['other_names'])) {
            $otherNames = explode(' ', $request['other_names']);
            foreach ($otherNames as $otherName) {
                DssOtherName::create([
                    'ident' => $dssCandidate->ident,
                    'name' => $otherName,
                ]);
            }
        }


        return response()->json(
            [
                "success" => true,
                'data' => $dssCandidate
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dssCandidate = DssCandidate::where('ident', $id)->with('otherNames')->first();

        if (!$dssCandidate) {
            return response()->json(
                [
                    "success" => false,
                    "message" => 'Resource not found',
                ],
                404
            );
        }

        return response()->json([
            "success" => true,
            "data" => $dssCandidate,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $dssCandidate = DssCandidate::where('ident', $id)->first();

        if (!$dssCandidate) {
            return response()->json(
                [
                    "success" => false,
                    "message" => 'Resource not found',
                ],
                404
            );
        }

        $dssCandidate->delete();

        return response()->json([], 204);
    }
}
