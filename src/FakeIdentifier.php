<?php namespace Guidsen\FakeIdentifier;

trait FakeIdentifier
{
    public function getAttribute($key)
    {
        if ($key == app('optimus')->getAttributeName())
            return app('optimus')->encode($this->attributes[$this->primaryKey]);

        return parent::getAttribute($key);
    }

    public function setAppends(array $appends)
    {
        $attributeName = app('optimus')->getAttributeName();
        $this->appends = array_merge($this->appends, [$attributeName]);
    }
}