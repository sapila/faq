<?php namespace App\Controllers\View;

use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 15/05/2017
 * Time: 23:27
 */

abstract class AbstractViewController
{
    /**
     * @var
     */
    private $templator;

    /**
     * AbstractViewController constructor.
     */
    public function __construct()
    {
        $loader = new FilesystemLoader([constant('root_path') . '/resources/views/%name%']);
        $this->templator = new PhpEngine(new TemplateNameParser(), $loader);
    }

    /**
     * Render template with variables
     *
     * @param $view
     * @param array $data
     */
    public function render($view, $data = [])
    {
        echo $this->templator->render($view.'.php', $data);
    }
}