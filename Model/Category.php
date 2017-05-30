<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 13/04/17
 * Time: 14:10
 */

namespace Miky\Component\Category\Model;


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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}