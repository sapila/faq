<?php
/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 16/05/2017
 * Time: 04:27
 */

namespace App\Routing\Middleware;


interface MiddlewareInterface
{
    public function fire();
}