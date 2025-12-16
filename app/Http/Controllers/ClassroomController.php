<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classrooms\StoreClassroomRequest;
use App\Http\Requests\Classrooms\UpdateClassroomRequest;
use App\Http\Resources\ClassroomResource;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CLassroomresource::collection(
            Classroom::query()->with(['teacher', 'subject'])
                ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        $data = $request->validated();

        Classroom::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        return response()->json(
            ClassroomResource::make($classroom),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
       $data = $request->validated();

       $classroom->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return response()->noContent();
    }
}
