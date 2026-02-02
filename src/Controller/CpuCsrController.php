<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CpuCsrController extends AbstractController
{
    #[Route('/csr/cpus', name: 'csr_cpus', methods: ['GET'])]
    public function csrCpus(): Response
    {
        // 단순히 뷰만 반환 (데이터는 JS에서 REST API 호출)
        return $this->render('csr/csr_cpu_total.html.twig');
    }
}
