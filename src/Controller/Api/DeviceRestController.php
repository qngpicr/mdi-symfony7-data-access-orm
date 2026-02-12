<?php

namespace App\Controller\Api;

use App\Service\DeviceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DeviceRestController extends AbstractController
{
    private DeviceService $service;

    public function __construct(DeviceService $service)
    {
        $this->service = $service;
    }

    #[Route('/api/devices', name: 'device_index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $devices = $this->service->getAll();
        $data = array_map(fn($d) => $this->toArray($d), $devices);
        return $this->json($data);
    }

    #[Route('/api/devices/{id}', name: 'device_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $device = $this->service->getById($id);
        return $device ? $this->json($this->toArray($device)) : $this->json(['error' => 'Device not found'], 404);
    }

    #[Route('/api/devices', name: 'device_store', methods: ['POST'])]
    public function store(Request $request): JsonResponse
    {
        $device = $this->service->create($request->request->all());
        return $this->json($this->toArray($device), 201);
    }

    #[Route('/api/devices/{id}', name: 'device_update', methods: ['PUT'])]
    public function update(Request $request, int $id): JsonResponse
    {
        $device = $this->service->update($id, $request->request->all());
        return $device ? $this->json($this->toArray($device)) : $this->json(['error' => 'Device not found or not updated'], 404);
    }

    #[Route('/api/devices/{id}', name: 'device_delete', methods: ['DELETE'])]
    public function destroy(int $id): JsonResponse
    {
        return $this->service->delete($id)
            ? $this->json(['message' => 'Device deleted'])
            : $this->json(['error' => 'Device not found'], 404);
    }

    private function toArray($device): array
    {
        return [
            'id_device'      => $device->getIdDevice(),
            'name_device'    => $device->getNameDevice(),
            'type_device'    => $device->getTypeDevice(),
            'release_device' => $device->getReleaseDevice(),
            'manf_code_device' => $device->getManfCodeDevice(),
        ];
    }
}
