<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\OrganisationUnit;


class OrganisationUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => OrganisationUnit::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:191|unique:organisation_units,code',
            'name' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ], 422);
        }

        $organisationUnit = OrganisationUnit::create($request->all());

        return response()->json([
            "success" => true,
            "data" => $organisationUnit,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $organisationUnit = OrganisationUnit::find($id);
        return response()->json([
            "success" => true,
            "data" => $organisationUnit,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $organisationUnit = OrganisationUnit::find($id);
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:191|unique:organisation_units,code,' . $id . ',code',
            'name' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ], 422);
        }

        $organisationUnit->update($request->all());

        return response()->json([
            "success" => true,
            "data" => $organisationUnit,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organisationUnit = OrganisationUnit::find($id);
        $organisationUnit->delete();

        return response()->json([
            "success" => true,
            "message" => "Organisation unit deleted successfully.",
        ], 200);
    }
}
