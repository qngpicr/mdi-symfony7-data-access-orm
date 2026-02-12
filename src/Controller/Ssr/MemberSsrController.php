<?php

namespace App\Controller\Ssr;

use App\Service\MemberService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemberSsrController extends AbstractController
{
    private MemberService $service;

    public function __construct(MemberService $service)
    {
        $this->service = $service;
    }

    #[Route('/ssr/members', name: 'ssr_members', methods: ['GET'])]
    public function ssrMembers(): Response
    {
        $memberList = $this->service->getAll();
        return $this->render('ssr/ssr_member_total.html.twig', [
            'memberList' => $memberList,
        ]);
    }
}
