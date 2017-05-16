<?php namespace App\Controllers\View;
use App\Helpers\Validator;
use App\Models\User;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 15/05/2017
 * Time: 23:26
 */

class LoginController extends AbstractViewController
{
    /**
     * Show login form
     */
    public function show()
    {
        $this->render('login');
    }

    /**
     * Handle login Form submission
     */
    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|min:8'
        ];

        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        $validator = new Validator();
        $validator->validate($rules, $data);

        if ($validator->getErrors()) {
            $this->render('login', [ 'errors' => $validator->getErrors()]);
            return;
        }

        $user = new User();
        if (!$found = $user->existsWithCredential($data['username'], $data['password'])) {
            $this->render('login', [ 'errors' => ['Incorrect credentials']]);
            return;
        }

        $_SESSION['user'] = $found['id'];
        header('Location: /questions');
    }
}