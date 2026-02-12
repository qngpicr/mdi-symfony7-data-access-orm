<?php

namespace App\Controller\Api;

use App\Service\MemberService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MemberRestController extends AbstractController
{
    private MemberService $service;

    public function __construct(MemberService $service)
    {
        $this->service = $service;
    }

    #[Route('/api/members', name: 'member_index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $members = $this->service->getAll();
        $data = array_map(fn($m) => $this->toArray($m), $members);
        return $this->json($data);
    }

    #[Route('/api/members/{id}', name: 'member_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $member = $this->service->getById($id);
        return $member ? $this->json($this->toArray($member)) : $this->json(['error' => 'Member not found'], 404);
    }

    #[Route('/api/members', name: 'member_store', methods: ['POST'])]
    public function store(Request $request): JsonResponse
    {
        $member = $this->service->create($request->request->all());
        return $this->json($this->toArray($member), 201);
    }

    #[Route('/api/members/{id}', name: 'member_update', methods: ['PUT'])]
    public function update(Request $request, int $id): JsonResponse
    {
        $member = $this->service->update($id, $request->request->all());
        return $member ? $this->json($this->toArray($member)) : $this->json(['error' => 'Member not found or not updated'], 404);
    }

    #[Route('/api/members/{id}', name: 'member_delete', methods: ['DELETE'])]
    public function destroy(int $id): JsonResponse
    {
        return $this->service->delete($id)
            ? $this->json(['message' => 'Member deleted'])
            : $this->json(['error' => 'Member not found'], 404);
    }

    private function toArray($member): array
    {
        return [
            'id_member'       => $member->getIdMember(),
            'name_member'     => $member->getNameMember(),
            'email_member'    => $member->getEmailMember(),
            'phone_member'    => $member->getPhoneMember(),
            'join_date_member'=> $member->getJoinDateMember()?->format('Y-m-d'),
            'role_member'     => $member->getRoleMember(),
        ];
    }
}
