<?php

use App\Blog;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BlogControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_blogs_are_displayed_on_the_dashboard()
    {
        factory(Blog::class)->create(['title' => 'Title 1', 'content' => 'content 1']);
        factory(Blog::class)->create(['title' => 'Title 2', 'content' => 'content 2']);
        factory(Blog::class)->create(['title' => 'Title 3', 'content' => 'content 3']);
        
        $this->visit('/')
            ->see('Title 1')
            ->see('content 1')
            ->see('Title 2')
            ->see('content 2')
            ->see('Title 3')
            ->see('content 3');
    }

    public function test_blogs_can_be_created()
    {
        $this->visit('/')->dontSee('Title 1');
        $this->visit('/')->dontSee('content 1');
        $this->visit('/')
            ->type('Blog 1', 'title')
            ->type('content 1', 'content')
            ->press('Add Blog')
            ->see('Blog 1');
    }
    
    public function test_long_title_blog_cant_be_created()
    {
        $this->visit('/')
            ->type(str_random(200), 'title')
            ->type('content 1', 'content')
            ->press('Add Blog')
            ->see('Whoops!');
    }
}
