<?php namespace Guidsen\FakeIdentifier;

trait FakeIdentifierHelper
{
    public function decode($hash)
    {
        return app('optimus')->decode($hash);
    }

    public function encode($id)
    {
        return app('optimus')->encode($id);
    }
}