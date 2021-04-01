<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TagsUsed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $tags=[];
    public function __construct(array $tags)
    {
        $this->tags=$tags;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tags=$this->tags;
        return $this->markdown('mail.tags-used',compact('tags'));
    }
}
