<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Start Bootstrap',
        ]);

        $content = "
            <p>Note-taking is a powerful tool for self-improvement. It allows us to capture our thoughts, ideas, and insights in a tangible form. By jotting down our observations and reflections, we can better understand ourselves and the world around us. Just like a compass guides a traveler, notes guide us on our journey of personal growth and development.</p>

            <p>Through note-taking, we can explore new ideas, analyze information, and make connections between different concepts.</p>

            <p>By regularly reviewing and revisiting our notes, we can reinforce our learning, deepen our understanding, and uncover new insights. Notes act as a repository of knowledge and wisdom, allowing us to build upon our previous experiences and expand our intellectual horizons.</p>

            <p>Just as a sculptor refines a block of marble into a masterpiece, note-taking helps us shape our thoughts and ideas into something meaningful and impactful. It enables us to transform raw information into actionable knowledge, empowering us to make informed decisions and take purposeful actions.</p>

            <p>In a world filled with distractions and information overload, note-taking provides us with a sense of focus and clarity. It allows us to filter out the noise and concentrate on what truly matters. By capturing and organizing our thoughts, we can navigate the complexities of life with intention and purpose.</p>

            <h2 class=\"section-heading\">The Final Frontier</h2>
            
            <p>There can be no thought of finishing for 'aiming for the stars.' Both figuratively and literally, note-taking is a lifelong practice. It is a journey that spans generations, with each new note building upon the previous ones. No matter how much progress we make, there is always the thrill of discovering new insights and expanding our knowledge.</p>

            <blockquote class=\"blockquote\">The dreams of yesterday are the hopes of today and the reality of tomorrow. Note-taking allows us to capture our dreams and transform them into actionable plans. It bridges the gap between imagination and reality, turning aspirations into achievements.</blockquote>

            <p>Note-taking is a collective endeavor. It is not the work of any one person, but a collaborative effort of thinkers and learners throughout history. It is a testament to the human desire for knowledge and progress.</p>

            <h2 class=\"section-heading\">Reaching for the Stars</h2>

            <p>As we embark on our note-taking journey, our perspective expands. Like the Earth diminishing in size as we move further away, our understanding deepens and broadens. We realize the vastness of knowledge and the infinite possibilities for growth and discovery.</p>

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/home/post-sample-image.jpg') . "\" alt=\"...\" /></a>

            <span class=\"caption text-muted\">To go places and do things that have never been done before – that’s what living is all about.</span>

            <p>Note-taking is our vessel for exploring the final frontier of knowledge. It allows us to boldly go where no one has gone before, uncovering new insights and pushing the boundaries of human understanding.</p>

            <p>As I stand here, surrounded by the wonders of the unknown, I realize that note-taking is the key to unlocking the secrets of the universe. It is through this practice of capturing and reflecting that we can truly explore the depths of our own potential and the mysteries of the world around us.</p>
        ";

        $publishedAt = now()->subDays(0)->format('Y-m-d');

        Post::create([
            'user_id' => $user->id,
            'title' => 'Man must explore, and this is exploration at its greatest',
            'subheading' => 'Problems look mighty small from 150 miles up',
            'content' => $content,
            'cover_image' => 'img/home/post-sample-image.jpg',
            'published_at' => $publishedAt,
            'created_at' => $publishedAt,
            'updated_at' => $publishedAt,
        ]);

        // Create additional random posts
        Post::factory(49)->create();
    }
}
