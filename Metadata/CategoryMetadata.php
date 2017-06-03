<?php

namespace Miky\Component\Category\Metadata;

class CategoryMetadata
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $managerServiceId;

    /**
     * @var string
     */
    private $modelClass;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @param string $alias
     * @param string $alias
     * @param array $parameters
     */
    private function __construct($name, array $parameters)
    {
        $this->name = $name;
        $this->modelClass = $parameters['class'];
        $this->managerServiceId = $parameters['manager'];
        $this->parameters = $parameters;
    }
    /**
     * @param string $name
     * @param array $parameters
     *
     * @return self
     */
    public static function fromAliasAndConfiguration($name, array $parameters)
    {
        return new self($name, $parameters);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getManagerServiceId()
    {
        return $this->managerServiceId;
    }

    /**
     * @return string
     */
    public function getFormattedManagerServiceId()
    {
        $id = "miky_category.categories.".$this->name."_manager";
        $this->managerServiceId = $id;
        return $id;
    }
    /**
     * @return string
     */
    public function getModelClass()
    {
        return $this->modelClass;
    }

    public function getClassParameterId()
    {
        return "miky_category.model.categories.".$this->name.".class";
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    public function hasResource()
    {
        return isset($this->parameters['resource']);
    }

    public function getResource()
    {
        return $this->parameters['resource'];
    }

    public function getResourceAlias()
    {
        return "miky_category.".$this->name."_category";
    }
}