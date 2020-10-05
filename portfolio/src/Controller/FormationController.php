<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;





class FormationController extends AbstractController
{
    /**
     * @Route("/formation", name="formation")
     */
    public function manage(FormationRepository $formationRepository)
    {
        $formation = $formationRepository->findAll();

        return $this->render('formation/manage.html.twig', [
            'formations' => $formation
        ]);
    }

    /**
     * @Route("/formation_create", name="formation_create")
     */

    public function create(Request $request)
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($formation);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'success',
                'La compétence a été ajoutée avec succés'
            );

            return $this->redirectToRoute('formation_manage');
        }

        return $this->render('formation/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/formation_update-{id}", name="formation_update")
     */

    public function updateFormation(FormationRepository $formationRepository, $id, Request $request)
    {
        $formation = $formationRepository->find($id);

        $form = $this->createForm(FormationType::class, $formation)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($formation);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'success',
                'La compétence a été ajoutée avec succés'
            );

            return $this->redirectToRoute('formation_manage');
        }

        return $this->render('formation/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/formation_delete-{id}", name="delete")
     */
    public function deleteFormation(FormationRepository $formationRepository, $id)
    {
        $formation = $formationRepository->find($id);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($formation);
        $manager->flush();

        return $this->redirectToRoute('formation_manage');
    }
}
