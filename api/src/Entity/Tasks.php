<?php

namespace App\Entity;

use App\Repository\TasksRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

/**
 * @ORM\Entity(repositoryClass=TasksRepository::class)
 * @ORM\Table(name="tasks")
 */
class Tasks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    private $provider;

    public function getProviderType()
    {
        return $this->provider;
    }

    /**
     * @param mixed $providerType
     */
    public function setProviderType(string $providerType)
    {
        $this->provider = $providerType;
    }

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $level;

    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel(int $level)
    {
        $this->level = $level;
    }

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $duration;

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $time;

    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

}
