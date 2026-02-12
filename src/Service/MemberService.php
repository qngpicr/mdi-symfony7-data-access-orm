<?php

namespace App\Service;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Doctrine\ORM\EntityManagerInterface;

class MemberService
{
    private MemberRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(MemberRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    public function getById(int $id): ?Member
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Member
    {
        $member = new Member();
        $member->setNameMember($data['name_member'] ?? null);
        $member->setEmailMember($data['email_member'] ?? null);
        $member->setPhoneMember($data['phone_member'] ?? null);
        $member->setJoinDateMember(isset($data['join_date_member']) ? new \DateTime($data['join_date_member']) : null);
        $member->setRoleMember($data['role_member'] ?? 'USER');

        $this->em->persist($member);
        $this->em->flush();

        return $member;
    }

    public function update(int $id, array $data): ?Member
    {
        $member = $this->repository->find($id);
        if (!$member) {
            return null;
        }

        $member->setNameMember($data['name_member'] ?? $member->getNameMember());
        $member->setEmailMember($data['email_member'] ?? $member->getEmailMember());
        $member->setPhoneMember($data['phone_member'] ?? $member->getPhoneMember());
        if (isset($data['join_date_member'])) {
            $member->setJoinDateMember(new \DateTime($data['join_date_member']));
        }
        $member->setRoleMember($data['role_member'] ?? $member->getRoleMember());

        $this->em->flush();
        return $member;
    }

    public function delete(int $id): bool
    {
        $member = $this->repository->find($id);
        if (!$member) {
            return false;
        }

        $this->em->remove($member);
        $this->em->flush();
        return true;
    }
}
