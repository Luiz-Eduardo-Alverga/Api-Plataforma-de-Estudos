<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teachers\StoreTeacherRequest;
use App\Http\Requests\Teachers\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return TeacherResource::collection(
            Teacher::query()->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request) {
        $data = $request->validated();

        return TeacherResource::make(
            Teacher::query()->create($data)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher){
        return response()->json(TeacherResource::make($teacher));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $data = $request->validated();

        $teacher->update($data);

        return TeacherResource::make($teacher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->noContent();
    }
}
