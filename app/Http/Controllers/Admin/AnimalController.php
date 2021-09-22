<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal\Animal;
use App\Models\Animal\AnimalStatus;
use App\Models\Animal\AnimalType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, AnimalType $animalType)
    {
        $animals = Animal::with(['type', 'status'])->orderBy('name');

        if ($request->type_id != '') {
            $animalType = AnimalType::find($request->type_id);
            if ($animalType) {
                $animals->where('type_id', $animalType->id);
            }
        }

        return view('admin.animals.index', [
            'animals' => $animals->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.animals.create', [
            'types' => AnimalType::all(),
            'statuses' => AnimalStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required|integer',
            'type_id' => 'required|integer',
            'status_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.animals.create')
                ->withErrors($validator)
                ->withInput();
        }

        Animal::create($request->all());

        return redirect()->route('admin.animals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
