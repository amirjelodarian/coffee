<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyFormRequest;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyController extends Controller
{
    public function store(SurveyFormRequest $request)
    {
        Survey::create([
            'name' => $request->input('name'),
            'message' => $request->input('message')
        ]);

        return response()->json('با موفقیت ثبت شد',Response::HTTP_OK);
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();

        return response()->json('با موفقیت پاک شد',Response::HTTP_OK);
    }



}
