<?php

namespace Acme\Modules\Blog\Support;

trait Slugable
{
    protected function slug(string $string): string
    {
        return $this->noNonDashes($this->whiteSpacesForDashes($this->noNonCharacters($string)));
    }

    protected function whiteSpacesForDashes(string $title): string
    {
        return \preg_replace('/\s+/', '-', \strtolower($title));
    }

    protected function noNonCharacters(string $title): string
    {
        return \preg_replace('/[^\w| -]+/', '', $title);
    }

    protected function noNonDashes(string $title): string
    {
        return \trim($title, '-');
    }
}
