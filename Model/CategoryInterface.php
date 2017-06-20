<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 13/04/17
 * Time: 16:09
 */

namespace Miky\Component\Category\Model;


interface CategoryInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return Category
     */
    public function setDescription($description);

    /**
     * @return mixed
     */
    public function getParent();

    /**
     * @param mixed $parent
     * @return Category
     */
    public function setParent($parent);

    /**
     * @return CategoryInterface[]
     */
    public function getChildren();

    /**
     * @param CategoryInterface[] $children
     * @return Category
     */
    public function setChildren($children);

    /**
     * Add child
     *
     * @param CategoryInterface $child
     *
     * @return CategoryInterface
     */
    public function addChild(CategoryInterface $child);

    /**
     * Remove child
     *
     * @param CategoryInterface $child
     */
    public function removeChild(CategoryInterface $child);
}