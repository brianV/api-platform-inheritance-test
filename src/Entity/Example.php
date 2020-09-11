<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExampleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   normalizationContext={"groups"={"example"}},
 *   denormalizationContext={"groups"={"example"}},
 * )
 * @ORM\Entity(repositoryClass=ExampleRepository::class)
 */
class Example
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"example"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"example"})
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=MappedSuperclass::class, cascade={"persist", "remove"})
     * @Groups({"example"})
     */
    private $child;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getChild(): ?MappedSuperclass
    {
        return $this->child;
    }

    public function setChild(?MappedSuperclass $child): self
    {
        $this->child = $child;

        return $this;
    }
}
