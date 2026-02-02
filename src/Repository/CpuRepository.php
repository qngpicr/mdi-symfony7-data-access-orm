<?php

namespace App\Repository;

use App\Entity\Cpu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cpu>
 */
class CpuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cpu::class);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }

    public function getById(int $id): ?Cpu
    {
        return $this->find($id);
    }
}
