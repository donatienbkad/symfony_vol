<?php

namespace App\Controller;
use App\Entity\Vol;
use App\Repository\VolRepository;
use App\Form\VolType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(VolRepository $vol): Response
    {
        return $this->render('main/home.html.twig', [
            /*'controller_name' => 'MainController',*/
            'vols' => $vol->findAll(),
        ]);
    }
    public function flash(FlashyNotifier $flashy)
    {
        $flashy->error('No Permission!');
        return $this->redirectToRoute('home');
    }
}
