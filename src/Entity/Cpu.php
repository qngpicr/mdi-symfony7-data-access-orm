<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CpuRepository;

#[ORM\Entity(repositoryClass: CpuRepository::class)]
#[ORM\Table(name: 'cpu')]
class Cpu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_cpu', type: 'integer')]
    private ?int $id_cpu = null;

    #[ORM\Column(name: 'name_cpu', type: 'string', length: 255, nullable: true)]
    private ?string $name_cpu = null;

    #[ORM\Column(name: 'release_cpu', type: 'integer')]
    private int $release_cpu;

    #[ORM\Column(name: 'core_cpu', type: 'integer', nullable: true)]
    private ?int $core_cpu = null;

    #[ORM\Column(name: 'thread_cpu', type: 'integer', nullable: true)]
    private ?int $thread_cpu = null;

    #[ORM\Column(name: 'maxghz_cpu', type: 'float', nullable: true)]
    private ?float $maxghz_cpu = null;

    #[ORM\Column(name: 'minghz_cpu', type: 'float', nullable: true)]
    private ?float $minghz_cpu = null;

    #[ORM\Column(name: 'type_code_cpu', type: 'string', length: 50, options: ['default' => 'UNDEFINED'])]
    private string $type_code_cpu = 'UNDEFINED';

    #[ORM\Column(name: 'manf_code_cpu', type: 'string', length: 50, options: ['default' => 'UNDEFINED'])]
    private string $manf_code_cpu = 'UNDEFINED';

    // --- Getter/Setter ---
    public function getIdCpu(): ?int { return $this->id_cpu; }

    public function getNameCpu(): ?string { return $this->name_cpu; }
    public function setNameCpu(?string $name): self { $this->name_cpu = $name; return $this; }

    public function getReleaseCpu(): int { return $this->release_cpu; }
    public function setReleaseCpu(int $release): self { $this->release_cpu = $release; return $this; }

    public function getCoreCpu(): ?int { return $this->core_cpu; }
    public function setCoreCpu(?int $core): self { $this->core_cpu = $core; return $this; }

    public function getThreadCpu(): ?int { return $this->thread_cpu; }
    public function setThreadCpu(?int $thread): self { $this->thread_cpu = $thread; return $this; }

    public function getMaxghzCpu(): ?float { return $this->maxghz_cpu; }
    public function setMaxghzCpu(?float $max): self { $this->maxghz_cpu = $max; return $this; }

    public function getMinghzCpu(): ?float { return $this->minghz_cpu; }
    public function setMinghzCpu(?float $min): self { $this->minghz_cpu = $min; return $this; }

    public function getTypeCodeCpu(): string { return $this->type_code_cpu; }
    public function setTypeCodeCpu(string $type): self { $this->type_code_cpu = $type; return $this; }

    public function getManfCodeCpu(): string { return $this->manf_code_cpu; }
    public function setManfCodeCpu(string $manf): self { $this->manf_code_cpu = $manf; return $this; }
}
