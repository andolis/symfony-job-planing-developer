<?php
namespace App\Service\ProviderTasks\ProviderCli;

abstract class ProviderAbstract implements ProviderInterface
{
    /**
     * @var string $params
     */
    protected $params = [];

    /**
     * @var array $gettasklist
     */
    protected $gettasklist;

    /**
     * @var string $providerType
     */
    protected $providerType;

    /**
     * @var string $url
     */
    protected $url;

    /**
     * @var string $method
     */
    protected $method = "POST";

    /**
     * @return mixed
     */
    abstract public function getProviderTaskCurl();

    /**
     * @return mixed
     */
    abstract public function setProviderTaskModel();

    /**
     * @param $arr1
     * @return mixed
     */
    abstract public function setProviderTaskMerge(array $arr1);


    /**
     * @param array $params
     */
    public function setParams($params = [])
    {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $gettasklist
     */
    public function setTaskList($gettasklist = [])
    {
        $this->gettasklist = $gettasklist;
    }

    /**
     * @return string
     */
    public function getTaskList()
    {
        return $this->gettasklist;
    }

    /**
     * @param string $providerType
     */
    public function setProviderType($providerType = "")
    {
        $this->providerType = $providerType;
    }

    /**
     * @return string
     */
    public function getProviderType()
    {
        return $this->providerType;
    }

    /**
     * @param string $url
     */
    public function setUrl($url = "")
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

}