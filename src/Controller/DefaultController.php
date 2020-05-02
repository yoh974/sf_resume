<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    const BASE_URL = 'http://127.0.0.1:8000';

    /**
     * @Route("/")
     */
    public function index()
    {

        return $this->redirect( self::BASE_URL . '/api');
    }
}