<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MappedSuperclassRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   denormalizationContext={"groups"={"example"}},
 * )
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *   "self" =         "App\Entity\MappedSuperclass",
 *   "child" =        "App\Entity\Child",
 *   "other_child" =  "App\Entity\OtherChild",
 * })
 * @ORM\Entity(repositoryClass=MappedSuperclassRepository::class)
 */
class MappedSuperclass
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
}
