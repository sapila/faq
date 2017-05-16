<?php namespace App\Routing;

use App\Controllers\View\CategoriesController;
use App\Controllers\View\LoginController;
use App\Controllers\View\QuestionController;
use App\Routing\Middleware\AuthMiddleware;

class Router
{
    /**
     * Available routes
     *
     * @var array
     */
    protected $routes = [
        'login' => [
            'GET' => [
                'class'  => LoginController::class,
                'function' => 'show'
            ],
            'POST' => [
                'middleware' => [
                    AuthMiddleware::class
                ],
                'class'  => LoginController::class,
                'function' => 'login'
            ]
        ],
        'categories' => [
            'GET' => [
                'middleware' => [
                    AuthMiddleware::class
                ],
                'class'  => CategoriesController::class,
                'function' => 'show'
            ],
            'POST' => [
                'middleware' => [
                    AuthMiddleware::class
                ],
                'class'  => CategoriesController::class,
                'function' => 'other'
            ]
        ],
        'questions' => [
            'GET' => [
                'middleware' => [
                    AuthMiddleware::class
                ],
                'class'  => QuestionController::class,
                'function' => 'show'
            ],
            'POST' => [
                'middleware' => [
                    AuthMiddleware::class
                ],
                'class'  => QuestionController::class,
                'function' => 'store'
            ]
        ]

    ];

    /**
     * Parameteres parsed by ther Router
     * @var array
     */
    protected $parameters = [];

    /**
     * Route the uri given
     *
     * @param $uri
     */
    public function route($uri)
    {
        foreach ($this->routes as $route => $actions) {
            if ($this->routesMatch($route,$uri)) {
                $this->run($actions);
                return;
            }
        }

    }

    /**
     * Run middleware
     */
    protected function middleware($action)
    {
        if (key_exists('middleware', $action)) {
            foreach ($action['middleware'] as $middlewareClass) {
                $middleware = new $middlewareClass();
                $middleware->fire();
            }

        }
    }

    /**
     * Run an action for the matched route
     *
     * @param $actions
     */
    protected function run($actions)
    {
        foreach ($actions as $method => $action) {
            if ($_SERVER['REQUEST_METHOD'] == $method) {

                $this->middleware($action);

                $class = new $action['class']();
                call_user_func_array(
                    [$class,$action['function']],
                    $this->parameters
                );
                return;
            }
        }

        echo '404';

    }

    /**
     * Check if route maches uri
     *
     * @param $route
     * @param $uri
     * @return int
     */
    protected function routesMatch($route, $uri)
    {
        $is_matched = preg_match('/'.$route.'/',$uri, $this->parameters);

        // remove the actual route match and keep the parameters
        if (count($this->parameters) > 1) {
            array_shift($this->parameters);
        }

        return $is_matched ;
    }

}