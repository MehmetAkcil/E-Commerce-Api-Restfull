<?php
namespace Core\Controllers;


use Core\Config\QueryBuilder;
use Core\Models\UserModel;
use Exception;

class HomeController extends RootController
{

    /**
     * @throws Exception
     */
    public function index()
    {

        return self::view('index', [
            'title' => 'Merhaba Rest Api ECommerce'
        ]);
    }

    public function test(): string
    {
        return 'test';
    }
}