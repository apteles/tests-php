<?php

namespace Acme\Modules\Blog\Models;

use Acme\Modules\Blog\Support\Slugable;

class Article
{
    use Slugable;

    public string $title;

    public string $slug;

    public function __construct()
    {
        $this->title = '';
        $this->slug = '';
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        $this->slug = $this->slug($title);
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
