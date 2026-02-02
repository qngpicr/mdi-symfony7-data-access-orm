<?php

namespace App\Controller;

use App\Service\CpuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CpuSsrController extends AbstractController
{
    private CpuService $service;

    public function __construct(CpuService $service)
    {
        $this->service = $service;
    }

    #[Route('/ssr/cpus', name: 'ssr_cpus', methods: ['GET'])]
    public function ssrCpus(): Response
    {
        $cpuList = $this->service->getAll();
        return $this->render('ssr/ssr_cpu_total.html.twig', [
            'cpuList' => $cpuList,
        ]);
    }
}
