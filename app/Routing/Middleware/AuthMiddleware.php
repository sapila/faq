<?php namespace App\Routing\Middleware;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 16/05/2017
 * Time: 04:22
 */

class AuthMiddleware implements MiddlewareInterface
{
    public function fire()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
        }

        return;
    }
}