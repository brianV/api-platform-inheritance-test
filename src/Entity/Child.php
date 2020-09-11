<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ChildRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   denormalizationContext={"groups"={"example"}},
 * )
 * @ORM\Entity(repositoryClass=ChildRepository::class)
 */
class Child extends MappedSuperclass
{

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"example"})
     */
    private $child_name;

    public function getChildName(): ?string
    {
        return $this->child_name;
    }

    public function setChildName(string $child_name): self
    {
        $this->child_name = $child_name;

        return $this;
    }
}
