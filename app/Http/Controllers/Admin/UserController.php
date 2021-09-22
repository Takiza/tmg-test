<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal\Animal;
use App\Models\Animal\AnimalStatus;
use App\Models\Animal\AnimalType;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.users.index', [
            'users' => User::with('animals')->paginate(),
            'animalTypes' => AnimalType::all()
        ]);
    }

    /**
     * Give animal to user.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function giveAnimal(Request $request, User $user)
    {
        $animals = Animal::whereHas('status', function ($query) {
            $query->where('name', 'Active');
        });

        if ($request->type_id != 0) {
            $animalType = AnimalType::find($request->type_id);
            if ($animalType)
                $animals = $animals->where('type_id', $animalType->id);
        }

        $animal = $animals->orderBy('created_at')->first();

        if (!$animal) {
            return redirect()->route('admin.users.index');
        }


        $user->animals()->attach(1, array('animal_id' => $animal->id, 'user_id' => $user->id));

        $statusTransferred = AnimalStatus::firstWhere('name', 'Transferred');

        $animal->update([
            'status_id' => $statusTransferred->id
        ]);

        return view('admin.users.index', [
            'users' => User::paginate(),
            'animalTypes' => AnimalType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [

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
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
        }

        User::create($request->all());

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
