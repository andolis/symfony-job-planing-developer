<?php
namespace App\Service\ProviderTasks\DataModel;


abstract class ProviderDataAbstract
{
    const PROVIDER1 = 'PROVIDER1';
    const PROVIDER2 = 'PROVIDER2';

    private $ProviderType;
    private $Level;
    private $Duration;
    private $ID;

    /**
     * @return mixed
     */
    abstract public function setObj();

    /**
     * @param mixed $providerType
     */
    public function setProviderType(string $providerType): void
    {
        $this->ProviderType = $providerType;
    }

    public function getProviderType() {
        return $this->ProviderType;
    }

    /**
     * @param mixed $level
     */
    public function setLevel(int $level): void
    {
        $this->Level = $level;
    }

    public function getLevel() {
        return $this->Level;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration(int $duration): void
    {
        $this->Duration = $duration;
    }

    public function getDuration() {
        return $this->Duration;
    }


    /**
     * @param mixed $id
     */
    public function setID($id): void
    {
        $this->ID = $id;
    }

    public function getID() {
        return $this->ID;
    }
}