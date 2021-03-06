<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Thread::class, 20)->create()->each(function ($thread) {
            factory(App\Reply::class, 10)->create(['thread_id' => $thread->id]);
        });
    }
}
