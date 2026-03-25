<?php

namespace App\Console\Commands;

use App\Models\SocialPost;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class MarkScheduledSocialPostsReady extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'social-posts:mark-ready';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Marca como listas las publicaciones sociales cuya fecha programada ya vencio.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $now = Carbon::now();

        $posts = SocialPost::query()
            ->where('status', SocialPost::STATUS_SCHEDULED)
            ->whereNotNull('publish_at')
            ->where('publish_at', '<=', $now)
            ->get();

        foreach ($posts as $post) {
            $post->update([
                'status' => SocialPost::STATUS_READY,
                'ready_at' => $now,
            ]);

            $post->logs()->create([
                'status' => 'ready',
                'message' => 'La publicacion alcanzo su fecha programada y quedo lista para integracion externa.',
                'payload' => [
                    'publish_at' => optional($post->publish_at)?->toDateTimeString(),
                ],
            ]);
        }

        $this->info("Publicaciones marcadas como listas: {$posts->count()}");

        return self::SUCCESS;
    }
}
