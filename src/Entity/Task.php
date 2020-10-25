<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isFinished;

    /**
     * @ORM\ManyToOne(targetEntity=ToDoList::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $list;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __toString()
    {
        return $this->name;
    }

    /** @ORM\PrePersist() */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime();
    }

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

    public function getIsFinished(): ?bool
    {
        return $this->isFinished;
    }

    public function setIsFinished(?bool $isFinished): self
    {
        $this->isFinished = $isFinished;

        return $this;
    }

    public function getList(): ?ToDoList
    {
        return $this->list;
    }

    public function setList(?ToDoList $list): self
    {
        $this->list = $list;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
