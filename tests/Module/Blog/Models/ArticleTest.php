<?php

use PHPUnit\Framework\TestCase;
use Acme\Modules\Blog\Models\Article;

class ArticleTest extends TestCase
{
    private Article $article;

    protected function setUp(): void
    {
        $this->article = new Article;
    }

    public function test_title_should_be_empty_by_default()
    {
        $this->assertEmpty($this->article->title);
    }

    public function test_slug_should_be_empty_if_no_title_is_passed()
    {
        $this->assertEquals('', $this->article->getSlug());
    }

    public function test_slug_should_have_white_spaces_replaced_by_undercore()
    {
        $this->article->setTitle('World of wars');

        $this->assertEquals('world-of-wars', $this->article->getSlug());
    }

    public function test_slug_should_have_multiples_white_spaces_replaced_by_undercore()
    {
        $this->article->setTitle("World   of  \n  wars");

        $this->assertEquals('world-of-wars', $this->article->getSlug());
    }

    public function test_slug_should_not_have_white_spaces_at_start_or_end_of_string()
    {
        $this->article->setTitle("  World   of  \n  wars  ");

        $this->assertEquals('world-of-wars', $this->article->getSlug());
    }

    public function test_slug_should_not_have_non_caracters()
    {
        $this->article->setTitle('World of wars!?');

        $this->assertEquals('world-of-wars', $this->article->getSlug());
    }

    public function titleProvider()
    {
        return [
            ['World of wars', 'world-of-wars'],
            ["World   of  \n  wars", 'world-of-wars'],
            ["  World   of  \n  wars  ", 'world-of-wars'],
            ['World of wars!?', 'world-of-wars'],
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function test_should_create_a_valid_slug($title, $slug)
    {
        $this->article->setTitle($title);

        $this->assertEquals($slug, $this->article->getSlug());
    }
}
