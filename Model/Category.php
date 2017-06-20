<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 13/04/17
 * Time: 14:10
 */

namespace Miky\Component\Category\Model;


use Doctrine\Common\Collections\ArrayCollection;
use Miky\Component\Core\Model\CommonModelInterface;
use Miky\Component\Core\Model\CommonModelTrait;

class Category implements CategoryInterface, CommonModelInterface
{
    Use CommonModelTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;
    
    /**
     * @var CategoryInterface
     */
    protected $parent;

    /**
     * @var CategoryInterface[]
     */
    protected $children;


    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return Category
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return CategoryInterface[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param CategoryInterface[] $children
     * @return Category
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }


    /**
     * Add child
     *
     * @param CategoryInterface $child
     *
     * @return CategoryInterface
     */
    public function addChild(CategoryInterface $child)
    {
        $child->setParent($this);
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param CategoryInterface $child
     */
    public function removeChild(CategoryInterface $child)
    {
        $this->children->removeElement($child);
    }

}