<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;


class SubjectController extends Controller
{

    public function index()
    {
        return SubjectResource::collection(
            Subject::query()->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request) {
        $data = $request->validated();

        return SubjectResource::make(
            Subject::query()->create($data)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject){
        return response()->json(SubjectResource::make($subject));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $data = $request->validated();

        $subject->update($data);

        return response()->json(SubjectResource::make($subject));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return response()->noContent();
    }
}
