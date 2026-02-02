<?php

namespace App\Controller\Api;

use App\Service\CpuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CpuRestController extends AbstractController
{
    private CpuService $service;

    public function __construct(CpuService $service)
    {
        $this->service = $service;
    }

    #[Route('/api/cpus', name: 'cpu_index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $cpus = $this->service->getAll();
        $data = array_map(fn($cpu) => $this->toArray($cpu), $cpus);

        return $this->json($data);
    }

    #[Route('/api/cpus/{id}', name: 'cpu_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $cpu = $this->service->getById($id);
        return $cpu ? $this->json($this->toArray($cpu)) : $this->json(['error' => 'CPU not found'], 404);
    }

    #[Route('/api/cpus', name: 'cpu_store', methods: ['POST'])]
    public function store(Request $request): JsonResponse
    {
        $cpu = $this->service->create($request->request->all());
        return $this->json($this->toArray($cpu), 201);
    }

    #[Route('/api/cpus/{id}', name: 'cpu_update', methods: ['PUT'])]
    public function update(Request $request, int $id): JsonResponse
    {
        $cpu = $this->service->update($id, $request->request->all());
        return $cpu ? $this->json($this->toArray($cpu)) : $this->json(['error' => 'CPU not found or not updated'], 404);
    }

    #[Route('/api/cpus/{id}', name: 'cpu_delete', methods: ['DELETE'])]
    public function destroy(int $id): JsonResponse
    {
        return $this->service->delete($id)
            ? $this->json(['message' => 'CPU deleted'])
            : $this->json(['error' => 'CPU not found'], 404);
    }

    private function toArray($cpu): array
    {
        return [
            'id_cpu'        => $cpu->getIdCpu(),
            'name_cpu'      => $cpu->getNameCpu(),
            'release_cpu'   => $cpu->getReleaseCpu(),
            'core_cpu'      => $cpu->getCoreCpu(),
            'thread_cpu'    => $cpu->getThreadCpu(),
            'maxghz_cpu'    => $cpu->getMaxghzCpu(),
            'minghz_cpu'    => $cpu->getMinghzCpu(),
            'type_code_cpu' => $cpu->getTypeCodeCpu(),
            'manf_code_cpu' => $cpu->getManfCodeCpu(),
        ];
    }
}
