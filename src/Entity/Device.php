<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DeviceRepository;

#[ORM\Entity(repositoryClass: DeviceRepository::class)]
#[ORM\Table(name: 'device')]
class Device
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_device', type: 'integer')]
    private ?int $id_device = null;

    #[ORM\Column(name: 'name_device', type: 'string', length: 255, nullable: true)]
    private ?string $name_device = null;

    #[ORM\Column(name: 'id_cpu', type: 'integer', nullable: true)]
    private ?int $id_cpu = null;

    #[ORM\Column(name: 'lineup_device', type: 'string', length: 100, nullable: true)]
    private ?string $lineup_device = null;

    #[ORM\Column(name: 'release_device', type: 'integer', nullable: true)]
    private ?int $release_device = null;

    #[ORM\Column(name: 'weight_device', type: 'float', nullable: true)]
    private ?float $weight_device = null;

    #[ORM\Column(name: 'type_code_device', type: 'string', length: 50, options: ['default' => 'UNDEFINED'])]
    private string $type_code_device = 'UNDEFINED';

    #[ORM\Column(name: 'manf_code_device', type: 'string', length: 50, options: ['default' => 'UNDEFINED'])]
    private string $manf_code_device = 'UNDEFINED';

    // --- Getter/Setter ---
    public function getIdDevice(): ?int { return $this->id_device; }

    public function getNameDevice(): ?string { return $this->name_device; }
    public function setNameDevice(?string $name): self { $this->name_device = $name; return $this; }

    public function getIdCpu(): ?int { return $this->id_cpu; }
    public function setIdCpu(?int $id): self { $this->id_cpu = $id; return $this; }

    public function getLineupDevice(): ?string { return $this->lineup_device; }
    public function setLineupDevice(?string $lineup): self { $this->lineup_device = $lineup; return $this; }

    public function getReleaseDevice(): ?int { return $this->release_device; }
    public function setReleaseDevice(?int $release): self { $this->release_device = $release; return $this; }

    public function getWeightDevice(): ?float { return $this->weight_device; }
    public function setWeightDevice(?float $weight): self { $this->weight_device = $weight; return $this; }

    public function getTypeCodeDevice(): string { return $this->type_code_device; }
    public function setTypeCodeDevice(string $type): self { $this->type_code_device = $type; return $this; }

    public function getManfCodeDevice(): string { return $this->manf_code_device; }
    public function setManfCodeDevice(string $manf): self { $this->manf_code_device = $manf; return $this; }
}
