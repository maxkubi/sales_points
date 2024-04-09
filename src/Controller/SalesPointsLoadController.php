<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\SalesPoint;

class SalesPointsLoadController extends AbstractController
{
    /**
     * @Route("/load-sales-points", name="load_sales_points")
     */
    public function loadSalesPoints(Request $request, EntityManagerInterface $entityManager): Response
    {
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'https://data.pid.cz/pointsOfSale/json/pointsOfSale.json');
        $data = $response->toArray();

        foreach ($data as $item) {
            $salesPoint = new SalesPoint();
            $salesPoint->setPidId($item['id']);
            $salesPoint->setType($item['type']);
            $salesPoint->setName($item['name']);
            $salesPoint->setAddress($item['address']);

            if (isset($item['openingHours'][0])) {
                $salesPoint->setOpeningHoursFrom($item['openingHours'][0]['from']);
                $salesPoint->setOpeningHoursTo($item['openingHours'][0]['to']);
            }

            $salesPoint->setLat($item['lat']);
            $salesPoint->setLon($item['lon']);
            $salesPoint->setServices($item['services']);
            $salesPoint->setPayMethods($item['payMethods']);

            $entityManager->persist($salesPoint);
        }

        $entityManager->flush();

        return new Response('Sales points ulozeny do database.');
    }
}
