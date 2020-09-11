<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OtherChildRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   denormalizationContext={"groups"={"example"}},
 * )
 * @ORM\Entity(repositoryClass=OtherChildRepository::class)
 */
class OtherChild extends MappedSuperclass
{
    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"example"})
     */
    private $other_child_name;

    public function getOtherChildName(): ?string
    {
        return $this->other_child_name;
    }

    public function setOtherChildName(string $other_child_name): self
    {
        $this->other_child_name = $other_child_name;

        return $this;
    }
}
