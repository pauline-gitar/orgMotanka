<?php


namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 */
class AdminController extends AbstractController

{
    /**
     * @Route("/connexion/admin_page", name="admin_page")
     */
    public function admin()
    {
        return $this->render('admin/adminPage.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}