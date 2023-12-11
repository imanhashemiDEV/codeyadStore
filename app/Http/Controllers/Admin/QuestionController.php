<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function userQuestions()
    {
        $title = "لیست پرسش و پاسخ";
        return view('admin.questions.list', compact('title'));
    }
}
