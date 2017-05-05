<?php

namespace App\Listeners;

use App\Events\BlogView;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Post;
use Illuminate\Session\Store;

class BlogViewListener
{
    private $session;
    /**
     * Create the event listener.
     * @param Store $session
     *
     * @return BlogViewListener
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  BlogView  $event
     * @return void
     */
    public function handle(BlogView $event)
    {
        if (!$this->isPostViewed($event->post)) {
            $event->post->increment('view_count');
            $event->post->view_count += 1;

            $this->storePost($event->post);
        }

    }

    private function isPostViewed($post)
    {
        // Get all the viewed posts from the session. If no
        // entry in the session exists, default to an
        // empty array.
        $viewed = $this->session->get('viewed_posts', []);

        // Check the viewed posts array for the existance
        // of the id of the post
        return in_array($post->id, $viewed);
    }

    private function storePost($post)
    {
        // Push the post id onto the viewed_posts session array.
        $this->session->push('viewed_posts', $post->id);
    }
}
