<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityEntity;
use Illuminate\Support\Facades\Validator;

class FacilityEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => FacilityEntity::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "tracked_entity_instance" => "required|string|unique:facility_entities,tracked_entity_instance",
            "organisation_unit" => "required|string|exists:organisation_units,code",
            "first_name" => "nullable|string|max:64",
            "last_name" => "nullable|string|max:64",
            "age" => "nullable|integer",
            "date_of_birth" => "nullable|date",
            "phone_number" => "nullable|string|max:20",
            "place_of_residence__physical_address" => "nullable|string|max:255",
            "registration_date" => "nullable|date",
            "incident_date" => "nullable|date",
            "date_of_registration" => "nullable|date",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ], 422);
        }

        // decide registration data
        $registrationDate = $request->input("incident_date") ?? $request->input("registration_date") ?? $request->input("date_of_registration") ?? null;

        $facilityEntity = FacilityEntity::create([
            "tracked_entity_instance" => $request->input("tracked_entity_instance"),
            "organisation_unit" => $request->input("organisation_unit"),
            "first_name" => $request->input("first_name"),
            "last_name" => $request->input("last_name"),
            "age" => $request->input("age"),
            "date_of_birth" => $request->input("date_of_birth"),
            "phone_number" => $request->input("phone_number"),
            "place_of_residence__physical_address" => $request->input("place_of_residence__physical_address"),
            "date_of_registration" => $registrationDate,
        ]);

        return response()->json([
            "success" => true,
            "data" => $facilityEntity,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
