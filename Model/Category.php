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
use Miky\Component\Media\Model\MediaInterface;

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
    protected $slug;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var MediaInterface
     */
    protected $media;

    /**
     * @var int
     */
    protected $position;

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
     * @return CategoryInterface
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
     * @return CategoryInterface
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
     * @return CategoryInterface
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
     * @return CategoryInterface
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

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return MediaInterface
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param MediaInterface $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}