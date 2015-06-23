<?php namespace Guidsen\FakeIdentifier;

class Optimus extends \Jenssegers\Optimus\Optimus
{
    protected $attributeName;

    /**
     * Set the attribute name which can be accessed in the Model
     *
     * @param string $name
     */
    public function setAttributeName($name)
    {
        $this->attributeName = $name;
    }

    /**
     * Returns the attribute name
     *
     * @return mixed
     */
    public function getAttributeName()
    {
        return ($this->attributeName) ?: 'hashed_id';
    }
}