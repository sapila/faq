<?php namespace App\Models;

use PDO;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 16/05/2017
 * Time: 05:35
 */


class Question extends Model
{
    protected $table = 'questions';

    public function getQuestions()
    {
        $statement = $this->db->prepare('SELECT * FROM ' .$this->table);

        //INNER JOIN answers ON '.$this->table .'.id = answers.question_id');
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}