<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyFormRequest;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyController extends Controller
{

    public function all()
    {
        return Survey::select('id' ,'name', 'message', 'created_at')->orderBy('id','desc')->get();
    }

    public function create(SurveyFormRequest $request)
    {
        $survey = Survey::create([
            'name' => $request->name,
            'message' => $request->message
        ]);
        if($survey)
            return response()->json(true);
        return response()->json(false);
    }

    public function show(Request $id)
    {
        $survey = Survey::find($id)->firstOrFail();
        if($survey)
            return $survey->message;
        return response()->json(false);
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();

        return response()->json('با موفقیت پاک شد',Response::HTTP_OK);
    }

}
