<?php

namespace App\Service;

use App\Entity\Cpu;
use App\Repository\CpuRepository;
use Doctrine\ORM\EntityManagerInterface;

class CpuService
{
    private CpuRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(CpuRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    public function getById(int $id): ?Cpu
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Cpu
    {
        $cpu = new Cpu();
        $cpu->setNameCpu($data['name_cpu'] ?? null);
        $cpu->setReleaseCpu($data['release_cpu']);
        $cpu->setCoreCpu($data['core_cpu'] ?? null);
        $cpu->setThreadCpu($data['thread_cpu'] ?? null);
        $cpu->setMaxghzCpu($data['maxghz_cpu'] ?? null);
        $cpu->setMinghzCpu($data['minghz_cpu'] ?? null);
        $cpu->setTypeCodeCpu($data['type_code_cpu'] ?? 'UNDEFINED');
        $cpu->setManfCodeCpu($data['manf_code_cpu'] ?? 'UNDEFINED');

        $this->em->persist($cpu);
        $this->em->flush();

        return $cpu;
    }

    public function update(int $id, array $data): ?Cpu
    {
        $cpu = $this->repository->find($id);
        if (!$cpu) {
            return null;
        }

        $cpu->setNameCpu($data['name_cpu'] ?? $cpu->getNameCpu());
        $cpu->setReleaseCpu($data['release_cpu'] ?? $cpu->getReleaseCpu());
        $cpu->setCoreCpu($data['core_cpu'] ?? $cpu->getCoreCpu());
        $cpu->setThreadCpu($data['thread_cpu'] ?? $cpu->getThreadCpu());
        $cpu->setMaxghzCpu($data['maxghz_cpu'] ?? $cpu->getMaxghzCpu());
        $cpu->setMinghzCpu($data['minghz_cpu'] ?? $cpu->getMinghzCpu());
        $cpu->setTypeCodeCpu($data['type_code_cpu'] ?? $cpu->getTypeCodeCpu());
        $cpu->setManfCodeCpu($data['manf_code_cpu'] ?? $cpu->getManfCodeCpu());

        $this->em->flush();
        return $cpu;
    }

    public function delete(int $id): bool
    {
        $cpu = $this->repository->find($id);
        if (!$cpu) {
            return false;
        }

        $this->em->remove($cpu);
        $this->em->flush();
        return true;
    }
}
