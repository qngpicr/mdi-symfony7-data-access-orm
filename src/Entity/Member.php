<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MemberRepository;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
#[ORM\Table(name: 'member')]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_member', type: 'integer')]
    private ?int $id_member = null;

    #[ORM\Column(name: 'id', type: 'string', length: 50)]
    private string $id;

    #[ORM\Column(name: 'pass', type: 'string', length: 255)]
    private string $pass;

    #[ORM\Column(name: 'name', type: 'string', length: 100)]
    private string $name;

    #[ORM\Column(name: 'email', type: 'string', length: 255)]
    private string $email;

    #[ORM\Column(name: 'regist_day', type: 'datetime')]
    private \DateTimeInterface $regist_day;

    #[ORM\Column(name: 'role', type: 'string', length: 50)]
    private string $role;

    #[ORM\Column(name: 'status', type: 'string', length: 50)]
    private string $status;

    #[ORM\Column(name: 'email_verified', type: 'boolean')]
    private bool $email_verified = false;

    #[ORM\Column(name: 'fail_count', type: 'integer')]
    private int $fail_count = 0;

    #[ORM\Column(name: 'last_login', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $last_login = null;

    #[ORM\Column(name: 'updated_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(name: 'deleted_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $deleted_at = null;

    // --- Getter/Setter ---
    public function getIdMember(): ?int { return $this->id_member; }
    public function getId(): string { return $this->id; }
    public function getPass(): string { return $this->pass; }
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getRegistDay(): \DateTimeInterface { return $this->regist_day; }
    public function getRole(): string { return $this->role; }
    public function getStatus(): string { return $this->status; }
    public function getEmailVerified(): bool { return $this->email_verified; }
    public function getFailCount(): int { return $this->fail_count; }
    public function getLastLogin(): ?\DateTimeInterface { return $this->last_login; }
    public function getUpdatedAt(): ?\DateTimeInterface { return $this->updated_at; }
    public function getDeletedAt(): ?\DateTimeInterface { return $this->deleted_at; }
}
