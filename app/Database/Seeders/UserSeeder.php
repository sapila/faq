<?php namespace App\Database\Seeders;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 16/05/2017
 * Time: 01:03
 */

use App\Database\DbConnection;
use App\Models\User;

class UserSeeder
{

    /**
     * @var \PDO
     */
    protected $db;

    /**
     * UserSeeder constructor.
     */
    public function __construct()
    {
        $this->db = DbConnection::getInstance()->getPDO();
    }

    public function seed()
    {
        $user = new User();
        $user->create('Nikos', 'myPassHere', User::ADMIN);
        $user->create('James', 'IamAGuest', User::GUEST);
    }
}