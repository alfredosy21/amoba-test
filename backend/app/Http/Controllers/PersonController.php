<?php

namespace App\Http\Controllers;

use Redirect;
use App\Person;
use App\Http\Resources\PersonResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PersonController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        try {
            $persons = Person::orderBy('created_at', 'asc')->get();
            return response(PersonResource::collection($persons), 200);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {

            $data = $request->all();

            $validator = Validator::make($data, [
                        'first_name' => 'required|max:255',
                        'last_name' => 'required|max:255',
                        'document' => 'required|max:12|unique:persons',
                        'ima_profile' => 'max:255',
                        'type_person' => 'in:0,1',
            ]);

            if ($validator->fails()) {
                return response(['error' => $validator->errors(), 'Validation Error'], 201);
            }

            $person = Person::create($data);

            return response()->json(['person' => new PersonResource($person), "msg" => "registro creado"], 200);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Survey $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person, Request $request) {
        try {
            return new PersonResource($person);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person) {
        try {

            $data = $request->all();

            $validator = Validator::make($data, [
                        'first_name' => 'required|max:255',
                        'last_name' => 'required|max:255',
                        'document' => 'required|max:12',
                        'ima_profile' => 'max:255',
                        'type_person' => 'in:0,1',
            ]);

            if ($validator->fails()) {
                return response(['error' => $validator->errors(), 'Validation Error'], 201);
            }

            $person->update($data);

            return response()->json(['person' => new PersonResource($person), "msg" => "actualizado"], 200);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person) {
        try {
            $person->delete();
            return response()->json(["msg" => "borrado"], 200);
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}
