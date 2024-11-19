<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use App\Repository\MeasurementRepository;
use App\Service\WeatherUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather/{location}', name: 'app_weather', requirements: ['location' => '[a-zA-Z]+'])]
    public function city(string $location, LocationRepository $locationRepository, WeatherUtil $util): Response
    {
        $locationEntity = $locationRepository->findOneBy(['city' => $location]);
        $measurements = $util->getWeatherForLocation($locationEntity);
        return $this->render('weather/city.html.twig', [
            'location' => $locationEntity,
            'measurements' => $measurements,
        ]);
    }
}