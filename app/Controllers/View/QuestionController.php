<?php namespace App\Controllers\View;

use App\Models\Question;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 15/05/2017
 * Time: 19:25
 */


class QuestionController
{
    public function show()
    {
        $question = new Question();
        $json = json_encode($question->getQuestions());
        var_dump($json);
        return;
    }

    public function hiall($var1, $var2)
    {
        echo 'this is hi ALL ALL ALL <br> <br> ' . $var1 .' <br>'. $var2 . ' <br>' . PHP_EOL;
    }
}