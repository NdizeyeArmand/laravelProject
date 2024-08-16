<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content1 = "
            <p>In the realm of personal knowledge management, <a href=\"https://obsidian.md\">Obsidian</a> has emerged as a powerful tool for organizing thoughts and ideas. This beginner's guide will introduce you to Obsidian's key features and help you get started on your journey to more effective note-taking.</p>

            <h2 class=\"section-heading\">What is Obsidian?</h2>
            
            <p>Obsidian is a markdown-based note-taking application that uses the zettelkasten method. It's designed to help you create an interconnected web of knowledge, emphasizing connections between ideas rather than mere collection of information.</p>

            <h2 class=\"section-heading\">Key Features of Obsidian</h2>

            <p>Obsidian offers several features that set it apart from traditional note-taking apps:</p>
            <ul>
                <li>Markdown formatting for easy-to-read and portable notes</li>
                <li>Linking between notes to create a knowledge network</li>
                <li>Local storage of your notes, ensuring privacy and control</li>
                <li>A plugin system for extending functionality</li>
                <li>Customizable workspace and themes</li>
            </ul>

            <blockquote class=\"blockquote\">Your second brain is only as powerful as the connections it can make. Obsidian helps you build those connections.</blockquote>

            <h2 class=\"section-heading\">Getting Started with Obsidian</h2>

            <p>To begin using Obsidian:</p>
            <ol>
                <li>Download and install <a href=\"https://obsidian.md\">Obsidian</a> from their official website</li>
                <li>Create a new vault (Obsidian's term for a note collection)</li>
                <li>Start creating notes using markdown syntax</li>
                <li>Link your notes using double square brackets [[like this]]</li>
                <li>Explore the graph view to visualize your note connections</li>
            </ol>

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/obsidian-interface.jpg') . "\" alt=\"Obsidian Interface\" /></a>
            <span class=\"caption text-muted\">The Obsidian interface, showcasing linked notes and the graph view.</span>

            <h2 class=\"section-heading\">Advanced Features</h2>

            <p>As you become more comfortable with Obsidian, explore these advanced features:</p>
            <ul>
                <li>Plugins for extended functionality like Kanban boards and calendar integration</li>
                <li>Templates for consistent note structures</li>
                <li>Dataview for querying and displaying note information</li>
                <li>Custom CSS for personalized themes</li>
            </ul>

            <h2 class=\"section-heading\">Community and Resources</h2>

            <p>Obsidian boasts a large and active community. Engage with other users through:</p>
            <ul>
                <li>The official Obsidian forum</li>
                <li>Reddit community r/ObsidianMD</li>
                <li>YouTube tutorials and showcases</li>
            </ul>

            <p>In conclusion, Obsidian offers a unique approach to note-taking and knowledge management. Its flexibility and powerful features make it an excellent choice for students, researchers, and anyone looking to organize their thoughts more effectively. Start small, experiment with different techniques, and gradually build your personal knowledge base with Obsidian.</p>
        ";

        $publishedAt1 = '2023-12-16';

        $post1 = Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Taking notes with Obsidian',
            'subheading' => 'A beginner\'s guide',
            'content' => $content1,
            'cover_image' => 'img/obsidian-interface.jpg',
            'published_at' => $publishedAt1,
            'created_at' => $publishedAt1,
            'updated_at' => $publishedAt1,
        ]);

        $tags1 = Tag::whereIn('name', ['Tutorial', 'Beginner'])->get();
        foreach ($tags1 as $tag) {
            $post1->tags()->attach($tag);
        };

        $content2 = "
            <p>Obsidian, the powerful note-taking and knowledge management app, becomes even more versatile with its extensive plugin ecosystem. As we move through 2024, certain plugins have emerged as essential tools for maximizing productivity and enhancing the Obsidian experience. Here's our curated list of must-have Obsidian plugins for 2024.</p>

            <h2 class=\"section-heading\">1. Dataview</h2>
            
            <p>Dataview remains a cornerstone plugin for Obsidian power users. It allows you to query and display data from your notes, creating dynamic views and automated summaries. Whether you're managing a project, tracking habits, or organizing research, Dataview turns your static notes into a powerful database.</p>

            <h2 class=\"section-heading\">2. Kanban</h2>

            <p>The Kanban plugin brings visual task management to Obsidian. It transforms your notes into customizable kanban boards, perfect for project management, workflow organization, or even as a writing tool. Its integration with Obsidian's linking system makes it a powerful addition to any workflow.</p>

            <blockquote class=\"blockquote\">Visualization is key to productivity. The right plugins can transform your notes into powerful visual tools.</blockquote>

            <h2 class=\"section-heading\">3. Calendar</h2>

            <p>The Calendar plugin offers a visual interface for navigating your daily notes and planning future entries. It's particularly useful for those who use Obsidian for journaling or time-based note organization. The latest updates have improved its integration with other plugins, making it more powerful than ever.</p>

            <h2 class=\"section-heading\">4. Excalidraw</h2>

            <p>For visual thinkers, Excalidraw is a game-changer. This plugin brings the popular drawing tool directly into Obsidian, allowing you to create sketches, diagrams, and mind maps within your notes. Its seamless integration with Obsidian's markdown system makes it invaluable for visual note-taking.</p>

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/Obsidian_desktop_demo_workflow.jpg') . "\" alt=\"Obsidian open with a chemistry note, graph view, and calendar open\" /></a>
            <span class=\"caption text-muted\">Enhance your note-taking experience with powerful Obsidian plugins.</span>

            <h2 class=\"section-heading\">5. Natural Language Dates</h2>

            <p>This plugin allows you to insert dates and times using natural language, streamlining the process of creating and linking to daily notes or setting reminders. It's a small addition that makes a big difference in daily use, especially for those who rely heavily on temporal organization.</p>

            <h2 class=\"section-heading\">6. Omnisearch</h2>

            <p>Omnisearch takes Obsidian's search functionality to the next level. It offers faster, more accurate search results with features like fuzzy matching and contextual previews. For those with large vaults, Omnisearch is indispensable for quickly finding the right information.</p>

            <p>In conclusion, these plugins represent just a fraction of what's available in the Obsidian community. Each adds unique functionality that can significantly enhance your note-taking and knowledge management processes. Remember to check the official Obsidian community plugin page for the most up-to-date versions and installation instructions. As Obsidian continues to evolve, so too does its plugin ecosystem, constantly offering new ways to customize and improve your personal knowledge management system.</p>
        ";

        $publishedAt2 = now()->subDays(0)->format('Y-m-d');

        $post2 = Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Must-have Obsidian plugins - 2024 edition',
            'subheading' => 'Level up your note-taking with these built-in and community plugins',
            'content' => $content2,
            'cover_image' => 'img/Obsidian_desktop_demo_workflow.jpg',
            'published_at' => $publishedAt2,
            'created_at' => $publishedAt2,
            'updated_at' => $publishedAt2,
        ]);

        $tags2 = Tag::whereIn('name', ['Plugins', 'Customization', 'Tips'])->get();
        foreach ($tags2 as $tag) {
            $post2->tags()->attach($tag);
        };

        $content3 = "
            <p>In the world of note-taking and personal knowledge management, Obsidian has emerged as a powerful tool for organizing thoughts and ideas. While the core app is free and feature-rich, there's one paid feature that stands out: Obsidian Sync. If you're an Obsidian user or considering diving into the app, here's why you should seriously consider trying Obsidian Sync.</p>

            <h2 class=\"section-heading\">Seamless Cross-Device Synchronization</h2>
            
            <p>One of the primary benefits of Obsidian Sync is its ability to keep your notes synchronized across multiple devices effortlessly. Whether you're working on your desktop, laptop, tablet, or smartphone, your notes are always up-to-date. This seamless integration ensures that you have access to your latest thoughts and ideas, regardless of where you are or which device you're using.</p>

            <h2 class=\"section-heading\">Enhanced Security and Privacy</h2>

            <p>Unlike third-party sync solutions, Obsidian Sync offers end-to-end encryption for your data. This means that your notes are encrypted before they leave your device and can only be decrypted by you. For those who value privacy and security, especially when dealing with sensitive information, this feature alone makes Obsidian Sync worth considering.</p>

            <blockquote class=\"blockquote\">Your thoughts are precious. Protect them with the same diligence you'd protect any other valuable asset.</blockquote>

            <h2 class=\"section-heading\">Version History and Conflict Resolution</h2>

            <p>Obsidian Sync maintains a version history of your notes, allowing you to revert to previous versions if needed. This feature is invaluable when you accidentally delete important information or want to track the evolution of your ideas over time. Additionally, the sync service handles conflict resolution smoothly, ensuring that you don't lose data when edits are made on different devices simultaneously.</p>

            <h2 class=\"section-heading\">Selective Syncing</h2>

            <p>Not all notes are created equal, and Obsidian Sync recognizes this. You have the flexibility to choose which vaults and folders to sync, allowing you to keep certain information local while sharing others across devices. This selective syncing capability helps you maintain control over your data and optimize storage usage.</p>

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/obsidian-sync-demo.png') . "\" alt=\"Obsidian Sync Demo\" /></a>
            <span class=\"caption text-muted\">Obsidian Sync keeps your notes organized and accessible across all your devices.</span>

            <h2 class=\"section-heading\">Support for Large Vaults</h2>

            <p>For power users with extensive note collections, Obsidian Sync shines by efficiently handling large vaults. The service is optimized to sync even substantial amounts of data quickly and reliably, ensuring that your entire knowledge base remains accessible and up-to-date.</p>

            <h2 class=\"section-heading\">Continuous Development and Support</h2>

            <p>By subscribing to Obsidian Sync, you're not just getting a service; you're supporting the ongoing development of Obsidian. The team behind the app is constantly working on improvements and new features, many of which are driven by user feedback and needs.</p>

            <p>In conclusion, while Obsidian is a fantastic tool on its own, Obsidian Sync elevates the experience to new heights. The peace of mind, convenience, and additional features it provides make it a worthwhile investment for anyone serious about their note-taking and personal knowledge management. Give Obsidian Sync a try, and you might find that it transforms the way you capture, organize, and access your ideas across all aspects of your life.</p>
        ";

        $publishedAt3 = now()->subDays(0)->format('Y-m-d');

        $post3 = Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Why you should try Obsidian Sync',
            'subheading' => 'The paid feature is well worth its price',
            'content' => $content3,
            'cover_image' => 'img/obsidian-sync-demo.png',
            'published_at' => $publishedAt3,
            'created_at' => $publishedAt3,
            'updated_at' => $publishedAt3,
        ]);

        $tags3 = Tag::whereIn('name', ['Review', 'Productivity'])->get();
        foreach ($tags3 as $tag) {
            $post3->tags()->attach($tag);
        };

        $content4 = "
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

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/home/post-bg.jpg') . "\" alt=\"...\" /></a>

            <span class=\"caption text-muted\">To go places and do things that have never been done before – that’s what living is all about.</span>

            <p>Note-taking is our vessel for exploring the final frontier of knowledge. It allows us to boldly go where no one has gone before, uncovering new insights and pushing the boundaries of human understanding.</p>

            <p>As I stand here, surrounded by the wonders of the unknown, I realize that note-taking is the key to unlocking the secrets of the universe. It is through this practice of capturing and reflecting that we can truly explore the depths of our own potential and the mysteries of the world around us.</p>
        ";

        $publishedAt4 = now()->subDays(1)->format('Y-m-d');

        $post4 = Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Man must explore, and this is exploration at its greatest',
            'subheading' => 'Problems look mighty small from 150 miles up',
            'content' => $content4,
            'cover_image' => 'img/home/post-sample-image.jpg',
            'published_at' => $publishedAt4,
            'created_at' => $publishedAt4,
            'updated_at' => $publishedAt4,
        ]);

        $tags4 = Tag::whereIn('name', ['Advanced'])->get();
        foreach ($tags4 as $tag) {
            $post4->tags()->attach($tag);
        };

        Post::factory(27)->create()->each(function ($post) {
            $randomTags = Tag::inRandomOrder()->take(rand(1, 5))->get();
            $post->tags()->attach($randomTags);
        });
    }
}
