<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Posts;

class SendEmailPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bhadresh:emails-send-posts {post*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails to the users whoever subscribe for website.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = $this->argument('post');

        $getUsersList = User::where('is_subscribe', 1)->get()->toArray();

        foreach($posts as $post){
            $getPost =Posts::find($post)->toArray();
            $data = array(
                    'title' => $getPost['title'],
                    'description' => $getPost['description'],
                    );
            foreach($getUsersList as $user){
                Mail::send('emails.subscriber_user_post', $data, function ($message) use($user){

                    $message->from(env('MAIL_USERNAME'));

                    $message->to($user['email'])->subject('Post from website by Bhadresh Laiya');

                });

            }
        }
        $this->info('The emails are send successfully!');
    }
}
