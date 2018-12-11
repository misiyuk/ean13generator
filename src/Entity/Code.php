<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CodeRepository")
 */
class Code
{
    private function __construct(){}

    /**
     * @ORM\Id()
     * @ORM\Column(type="boolean", options={"default": 1})
     */
    private $id;

    /**
     * @ORM\Column(type="integer", options={"default": 5000000000005, "unsigned": true})
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
