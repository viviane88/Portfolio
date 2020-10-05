<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(\Swift_Mailer $mailer, Request $request)
    {
        $formulaireContact = $this->createForm(ContactType::class);
        $formulaireContact->handleRequest($request);

        if($formulaireContact->isSubmitted() && $formulaireContact->isValid()){
            $infos = $formulaireContact->getData();
            $mail = (new \Swift_Message('Portfolio - demande de contact'))
                ->setFrom($infos['email'])
                ->setTo('david.hurtrel@gmail.com')
                ->setBody(
                    $this->renderView(
                        'contact/email.html.twig', [
                            'nom' => $infos['nom'],
                            'prenom' => $infos['prenom'],
                            'email' => $infos['email'],
                            'objet' => $infos['objet'],
                            'message' => $infos['message']
                        ],
                        'text/html'
                    )
                );
            $mailer->send($mail);
            $this->addFlash(
                'success',
                'Votre message a bien été envoyé'
            );
            return $this->redirectToRoute('home');
        }

        return $this->render('contact/contact.html.twig', [
            'formulaireDeContact' => $formulaireContact->createView(),
        ]);
    }
}