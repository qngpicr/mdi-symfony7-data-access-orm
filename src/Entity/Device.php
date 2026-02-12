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

    #[ORM\Column(name: 'type_device', type: 'string', length: 100, nullable: true)]
    private ?string $type_device = null;

    #[ORM\Column(name: 'release_device', type: 'integer', nullable: true)]
    private ?int $release_device = null;

    #[ORM\Column(name: 'manf_code_device', type: 'string', length: 50, options: ['default' => 'UNDEFINED'])]
    private string $manf_code_device = 'UNDEFINED';

    // --- Getter/Setter ---
    public function getIdDevice(): ?int { return $this->id_device; }

    public function getNameDevice(): ?string { return $this->name_device; }
    public function setNameDevice(?string $name): self { $this->name_device = $name; return $this; }

    public function getTypeDevice(): ?string { return $this->type_device; }
    public function setTypeDevice(?string $type): self { $this->type_device = $type; return $this; }

    public function getReleaseDevice(): ?int { return $this->release_device; }
    public function setReleaseDevice(?int $release): self { $this->release_device = $release; return $this; }

    public function getManfCodeDevice(): string { return $this->manf_code_device; }
    public function setManfCodeDevice(string $manf): self { $this->manf_code_device = $manf; return $this; }
}
