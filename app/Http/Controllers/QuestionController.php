<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = DB::table('questions')->inRandomOrder()->get();
        return view('quiz.index', ['questions' => $questions]);

    }
}
