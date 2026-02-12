<?php

namespace App\Controller\Csr;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeviceCsrController extends AbstractController
{
    #[Route('/csr/devices', name: 'csr_devices', methods: ['GET'])]
    public function csrDevices(): Response
    {
        return $this->render('csr/csr_device_total.html.twig');
    }
}
