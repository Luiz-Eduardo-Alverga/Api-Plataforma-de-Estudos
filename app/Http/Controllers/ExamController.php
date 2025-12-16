<?php

namespace App\Http\Controllers;
use App\Http\Requests\Exams\StoreExamRequest;
use App\Http\Requests\Exams\UpdateExamRequest;
use App\Http\Resources\ExamResource;
use App\Models\Exam;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExamResource::collection(
            Exam::query()->with(['teacher', 'subject'])
                ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        $data = $request->validated();

        Exam::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return response()->json(
            ExamResource::make($exam),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $data = $request->validated();

        $exam->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return response()->noContent();
    }
}
