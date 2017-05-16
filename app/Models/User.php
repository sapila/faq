<?php namespace App\Models;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 16/05/2017
 * Time: 01:13
 */

class User extends Model
{
    const ADMIN = 1;
    const GUEST = 2;

    protected $table = 'users';

    public function existsWithCredential($username, $password)
    {
        $hashed_password = $this->generatePasswordHash($password);
        $this->setAttribute('username', $username);
        $this->setAttribute('password', $hashed_password);
        return $this->find();
    }

    /**
     * Create User
     *
     * @param $username
     * @param $password
     * @param int $type
     */
    public function create($username, $password, $type = User::GUEST)
    {
        $hashed_password = $this->generatePasswordHash($password);

        $this->setAttribute('username', $username);
        $this->setAttribute('password', $hashed_password);
        $this->setAttribute('type', $type);
        $this->insert();
    }

    /**
     * Generate a hashed password
     *
     * @param $password
     * @return string
     */
    public function generatePasswordHash($password)
    {
        return hash_hmac(
            'sha256',
            'add_some_salt_here' .$password . 'add_some_salt_there',
            'Should_have_a_secret_key_Here',
            true
        );
    }
}