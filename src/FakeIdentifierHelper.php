<?php namespace Guidsen\FakeIdentifier;

trait FakeIdentifierHelper
{
    public function decode($hashedId)
    {
        return app('optimus')->decode($hashedId);
    }

    public function encode($id)
    {
        return app('optimus')->encode($id);
    }
}