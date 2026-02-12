<?php

namespace App\Service;

use App\Entity\Device;
use App\Repository\DeviceRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeviceService
{
    private DeviceRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(DeviceRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    public function getById(int $id): ?Device
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Device
    {
        $device = new Device();
        $device->setNameDevice($data['name_device'] ?? null);
        $device->setTypeDevice($data['type_device'] ?? null);
        $device->setReleaseDevice($data['release_device'] ?? null);
        $device->setManfCodeDevice($data['manf_code_device'] ?? 'UNDEFINED');

        $this->em->persist($device);
        $this->em->flush();

        return $device;
    }

    public function update(int $id, array $data): ?Device
    {
        $device = $this->repository->find($id);
        if (!$device) {
            return null;
        }

        $device->setNameDevice($data['name_device'] ?? $device->getNameDevice());
        $device->setTypeDevice($data['type_device'] ?? $device->getTypeDevice());
        $device->setReleaseDevice($data['release_device'] ?? $device->getReleaseDevice());
        $device->setManfCodeDevice($data['manf_code_device'] ?? $device->getManfCodeDevice());

        $this->em->flush();
        return $device;
    }

    public function delete(int $id): bool
    {
        $device = $this->repository->find($id);
        if (!$device) {
            return false;
        }

        $this->em->remove($device);
        $this->em->flush();
        return true;
    }
}
