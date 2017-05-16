<?php namespace App\Controllers\View;

use App\Models\Question;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 15/05/2017
 * Time: 19:25
 */


class QuestionController extends AbstractViewController
{
    public function show()
    {
        $question = new Question();
        $this->render('questions', [ 'entries' => $question->getQuestions()]);
    }

    public function add()
    {
        //echo 'this is hi ALL ALL ALL <br> <br> ' . $var1 .' <br>'. $var2 . ' <br>' . PHP_EOL;
    }
}