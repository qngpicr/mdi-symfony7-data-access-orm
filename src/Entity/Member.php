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

    #[ORM\Column(name: 'name_member', type: 'string', length: 255, nullable: true)]
    private ?string $name_member = null;

    #[ORM\Column(name: 'email_member', type: 'string', length: 255, nullable: true)]
    private ?string $email_member = null;

    #[ORM\Column(name: 'phone_member', type: 'string', length: 50, nullable: true)]
    private ?string $phone_member = null;

    #[ORM\Column(name: 'join_date_member', type: 'date', nullable: true)]
    private ?\DateTimeInterface $join_date_member = null;

    #[ORM\Column(name: 'role_member', type: 'string', length: 50, options: ['default' => 'USER'])]
    private string $role_member = 'USER';

    // --- Getter/Setter ---
    public function getIdMember(): ?int { return $this->id_member; }

    public function getNameMember(): ?string { return $this->name_member; }
    public function setNameMember(?string $name): self { $this->name_member = $name; return $this; }

    public function getEmailMember(): ?string { return $this->email_member; }
    public function setEmailMember(?string $email): self { $this->email_member = $email; return $this; }

    public function getPhoneMember(): ?string { return $this->phone_member; }
    public function setPhoneMember(?string $phone): self { $this->phone_member = $phone; return $this; }

    public function getJoinDateMember(): ?\DateTimeInterface { return $this->join_date_member; }
    public function setJoinDateMember(?\DateTimeInterface $date): self { $this->join_date_member = $date; return $this; }

    public function getRoleMember(): string { return $this->role_member; }
    public function setRoleMember(string $role): self { $this->role_member = $role; return $this; }
}
