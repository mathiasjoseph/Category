<?php

namespace Miky\Component\Category\Metadata;

class CategoryRegistry
{
    /**
     * @var array
     */
    private $metadata = [];

    /**
     * @return  CategoryMetadata[]
     */
    public function getAll()
    {
        return $this->metadata;
    }

    /**
     * @return CategoryMetadata
     */
    public function get($alias)
    {
        if (!array_key_exists($alias, $this->metadata)) {
            throw new \InvalidArgumentException(sprintf('Category "%s" does not exist.', $alias));
        }

        return $this->metadata[$alias];
    }


    public function getByClass($className)
    {
        foreach ($this->metadata as $metadata) {

            if ($className === $metadata->getModelClass) {
                return $metadata;
            }
        }

        throw new \InvalidArgumentException(sprintf('Category with model class "%s" does not exist.', $className));
    }


    public function add(CategoryMetadata $metadata)
    {
        $this->metadata[$metadata->getName()] = $metadata;
    }


    public function addFromAliasAndConfiguration($alias, array $configuration)
    {
        $this->add(CategoryMetadata::fromAliasAndConfiguration($alias, $configuration));
    }
}