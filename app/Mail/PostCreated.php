<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Post;
class PostCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $post=null;

    public function __construct(Post $post)
    {
        $this->post=$post;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $post=$this->post;
        return $this->view('mail.post-created',compact('post'));
    }
}
