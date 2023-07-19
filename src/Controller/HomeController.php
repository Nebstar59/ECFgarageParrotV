<?php

namespace App\Controller;

use App\Entity\Testimonial;
use App\Form\TestimonialType;
use App\Repository\CarRepository;
use App\Repository\PrestationRepository;
use App\Repository\ServiceRepository;
use App\Repository\TestimonialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request, CarRepository $carRepository, EntityManagerInterface $entityManager, ServiceRepository $serviceRepository, PrestationRepository $prestationRepository, TestimonialRepository $testimonialRepository): Response
    {
        $testimonial = new Testimonial();
        $form = $this->createForm(TestimonialType::class, $testimonial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $testimonial->setScope('private');
            $entityManager->persist($testimonial);
            $entityManager->flush();

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'cars' => $carRepository->getLastCars(),
            'bestCars' => $carRepository->getBestCars(),
            'prestations' => $prestationRepository->findAll(),
            'services' => $serviceRepository->findAll(),
            'testimonials' => $testimonialRepository->findAll(),
            'form' => $this->createForm(TestimonialType::class, new Testimonial())->createView(),
        ]);
    }
}
