<?php

namespace App\Controller;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SkillController extends AbstractController
{
    /**
     * @Route("/manage", name="manage")
     */
    public function manage(SkillRepository $skillRepository) 
    {
        $skills = $skillRepository->findAll();

        return $this->render('manage.html.twig', [
            'skills' => $skills
        ]);
    }

    /**
     * @Route("/create", name="create")
     */

    public function create(Request $request) 
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($skill);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'success',
                'La compétence a ét ajoutée avec succés'
            );

            return $this->redirectToRoute ('manage');
        }

        return $this->render('create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /* public function update()
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
    } */
}
