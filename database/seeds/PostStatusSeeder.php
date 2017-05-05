<?php

use Illuminate\Database\Seeder;
use App\PostStatus;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostStatus::create([
            'name' => 'draft',
            'display_name'   => 'Draft',
            'description' => 'Post or Comment will only be displayed to owner.',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        PostStatus::create([
            'name' => 'pending',
            'display_name'   => 'Pending',
            'description' => 'Comment awaiting approval.',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        PostStatus::create([
            'name' => 'approve',
            'display_name'   => 'Approve',
            'description' => 'Post or Comment that will be displayed to the public.',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        PostStatus::create([
            'name' => 'deny',
            'display_name'   => 'Deny',
            'description' => 'Comment denied by the Post owner.',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        PostStatus::create([
            'name' => 'publish',
            'display_name'   => 'Publish',
            'description' => 'Post or Comment is displayed to the public.',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
