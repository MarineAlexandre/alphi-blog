<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    /**
     * @Route("/theme", name="theme")
     */
    public function index()
    {
        return $this->render('theme/all.html.twig', [
            'controller_name' => 'ThemeController',
        ]);
    }

    /**
     * @Route("/themeOne", name="theme_show_one")
     */
    public function showOne()
    {
        return $this->render('theme/show.html.twig', [
            'controller_name' => 'ThemeController',
        ]);
    }
}
