<?php namespace Guidsen\FakeIndentifier;

trait FakeIdentifier
{
    public function getHashedIdAttribute()
    {
        return app('optimus')->encode($this->attributes['id']);
    }

    public function getAttribute($key)
    {
        if ($key == app('optimus')->getAttributeName())
            return app('optimus')->encode($this->attributes['id']);

        parent::getAttribute($key);
    }

    public function setAppends(array $appends)
    {
        $this->appends = array_merge($this->appends, ['hashed_id']);
    }
}