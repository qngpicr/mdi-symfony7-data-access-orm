<?php

namespace App\Controller\Ssr;

use App\Service\DeviceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeviceSsrController extends AbstractController
{
    private DeviceService $service;

    public function __construct(DeviceService $service)
    {
        $this->service = $service;
    }

    #[Route('/ssr/devices', name: 'ssr_devices', methods: ['GET'])]
    public function ssrDevices(): Response
    {
        $deviceList = $this->service->getAll();
        return $this->render('ssr/ssr_device_total.html.twig', [
            'deviceList' => $deviceList,
        ]);
    }
}
