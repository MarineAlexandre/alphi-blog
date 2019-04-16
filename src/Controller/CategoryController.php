<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        return $this->render('category/all.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route("/categoryOne", name="category_show_one")
     */
    public function showOne()
    {
        return $this->render('category/show.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
