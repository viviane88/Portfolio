<?php

namespace App\Controller;

use App\Repository\SkillRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;

class SkillController extends AbstractController
{
    /**
     * @Route("/", name="skill")
     */
    public function manage(SkillRepository $skillRepository) 
    {
        $skills = $skillRepository->findAll();


        return $this->render('manage.html.twig', [
            'skills' => $skills,
        ]);
    }

    public function create(Request $request) 
    {
        return $this->render('skill/index.html.twig', [
            'controller_name' => 'SkillController',
        ]);
    }

    public function update()
    {
        return $this->render('skill/index.html.twig', [
            'controller_name' => 'SkillController',
        ]);
    }

    public function delete()
    {
        return $this->render('skill/index.html.twig', [
            'controller_name' => 'SkillController',
        ]);
    }
}
