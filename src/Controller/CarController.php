<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Contact;
use App\Form\CarType;
use App\Form\ContactType;
use App\Form\PhotoType;
use App\Form\SearchCarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/', name: 'app_car_index', methods: ['GET', 'POST'])]
    public function index(Request $request, CarRepository $carRepository): Response
    {
       
        $searchCar = new Car();
        $form = $this->createForm(SearchCarType::class, $searchCar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchCar = $form->getData();
            $cars = $carRepository->findBySearch($searchCar);
        } else {
            $cars = $carRepository->findAll();
        }

        return $this->render('car/index.html.twig', [
            'cars' => $cars,
            'form' => $form->createView(),
        ]);
    }
           

    #[Route('/new', name: 'app_car_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $car->setCreatedAt(new \DateTimeImmutable());
            $car->setUpdatedAt(new \DateTimeImmutable());
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('car/new.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_car_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_car_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('car/edit.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_car_delete', methods: ['POST'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
    }

    // ajouter une route pour l'ajout de photos
    #[Route('/{id}/add-photo', name: 'app_car_add_photo', methods: ['GET', 'POST'])]
    public function addPhoto(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        // on crée un nouveau formulaire pour ajouter une photo
        $form = $this->createForm(PhotoType::class);
        $form->handleRequest($request);

        // si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // on récupère les données du formulaire
            $photo = $form->getData();
            // on associe la photo à la voiture
            $photo->setCar($car);
            // on enregistre la photo en base de données
            $entityManager->persist($photo);
            $entityManager->flush();

            // on redirige vers la page de la voiture
            return $this->redirectToRoute('app_car_show', ['id' => $car->getId()], Response::HTTP_SEE_OTHER);
        }

        // on affiche le formulaire
        return $this->render('photo/new.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    // ajouter une route pour permettre de contacter le garage pour une voiture
    #[Route('/{id}/contact', name: 'app_car_contact', methods: ['GET', 'POST'])]
    public function contact(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        // on crée un nouveau formulaire pour contacter le garage
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        // si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // on récupère les données du formulaire
            $contact = $form->getData();
            // on associe la voiture au contact
            $contact->setCar($car);
            // on enregistre le contact en base de données
            $entityManager->persist($contact);
            $entityManager->flush();

            // on redirige vers la page de la voiture
            return $this->redirectToRoute('app_car_show', ['id' => $car->getId()], Response::HTTP_SEE_OTHER);
        }

        // on affiche le formulaire
        return $this->render('contact/new.html.twig', [
            'car' => $car,
            'form' => $this->createForm(ContactType::class, $contact)->createView(),
        ]);
    }


}