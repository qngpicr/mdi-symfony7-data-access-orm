<?php

namespace App\Controller\Csr;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemberCsrController extends AbstractController
{
    #[Route('/csr/members', name: 'csr_members', methods: ['GET'])]
    public function csrMembers(): Response
    {
        return $this->render('csr/csr_member_total.html.twig');
    }
}
