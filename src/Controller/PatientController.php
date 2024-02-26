<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class PatientController extends AbstractController
{
    #[Route('/patient', name: 'app_patient')]
    public function inscriptionParticulier(UserPasswordHasherInterface $passwordHasher,Request $request,EntityManagerInterface $entityManager): Response
    {
        $patient = new Patient();
        $patient->setDateCreation(new \DateTime());
        // $patient->setRoles(['Patient']);
        $form = $this->createForm(PatientType::class, $patient); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($patient);
            $entityManager->flush();
 
            return $this->redirectToRoute('app_home');
        }
        return $this->render('patient/index.html.twig', [
            'form' => $form->createView(), 
        ]);
    }


}
