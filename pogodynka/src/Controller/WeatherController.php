<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use App\Repository\MeasurementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather/{location}', name: 'app_weather', requirements: ['location' => '[a-zA-Z]+'])]
    public function city(string $location, LocationRepository $locationRepository, MeasurementRepository $repository): Response
    {
        $locationEntity = $locationRepository->findOneBy(['city' => $location]);
        $measurements = $repository->findByLocation($locationEntity);
        return $this->render('weather/city.html.twig', [
            'location' => $locationEntity,
            'measurements' => $measurements,
        ]);
    }
}