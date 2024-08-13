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
        $content1 = "
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

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/obsidian-sync-demo.jpg') . "\" alt=\"Obsidian Sync Demo\" /></a>
            <span class=\"caption text-muted\">Obsidian Sync keeps your notes organized and accessible across all your devices.</span>

            <h2 class=\"section-heading\">Support for Large Vaults</h2>

            <p>For power users with extensive note collections, Obsidian Sync shines by efficiently handling large vaults. The service is optimized to sync even substantial amounts of data quickly and reliably, ensuring that your entire knowledge base remains accessible and up-to-date.</p>

            <h2 class=\"section-heading\">Continuous Development and Support</h2>

            <p>By subscribing to Obsidian Sync, you're not just getting a service; you're supporting the ongoing development of Obsidian. The team behind the app is constantly working on improvements and new features, many of which are driven by user feedback and needs.</p>

            <p>In conclusion, while Obsidian is a fantastic tool on its own, Obsidian Sync elevates the experience to new heights. The peace of mind, convenience, and additional features it provides make it a worthwhile investment for anyone serious about their note-taking and personal knowledge management. Give Obsidian Sync a try, and you might find that it transforms the way you capture, organize, and access your ideas across all aspects of your life.</p>
        ";

        $publishedAt1 = '2023-12-16';

        Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Taking notes with Obsidian',
            'subheading' => 'A beginner\'s guide to the powerful note-taking app',
            'content' => $content1,
            'cover_image' => 'img/home/post-sample-image.jpg',
            'published_at' => $publishedAt1,
            'created_at' => $publishedAt1,
            'updated_at' => $publishedAt1,
        ]);

        $content2 = "
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

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/obsidian-sync-demo.jpg') . "\" alt=\"Obsidian Sync Demo\" /></a>
            <span class=\"caption text-muted\">Obsidian Sync keeps your notes organized and accessible across all your devices.</span>

            <h2 class=\"section-heading\">Support for Large Vaults</h2>

            <p>For power users with extensive note collections, Obsidian Sync shines by efficiently handling large vaults. The service is optimized to sync even substantial amounts of data quickly and reliably, ensuring that your entire knowledge base remains accessible and up-to-date.</p>

            <h2 class=\"section-heading\">Continuous Development and Support</h2>

            <p>By subscribing to Obsidian Sync, you're not just getting a service; you're supporting the ongoing development of Obsidian. The team behind the app is constantly working on improvements and new features, many of which are driven by user feedback and needs.</p>

            <p>In conclusion, while Obsidian is a fantastic tool on its own, Obsidian Sync elevates the experience to new heights. The peace of mind, convenience, and additional features it provides make it a worthwhile investment for anyone serious about their note-taking and personal knowledge management. Give Obsidian Sync a try, and you might find that it transforms the way you capture, organize, and access your ideas across all aspects of your life.</p>
        ";

        $publishedAt2 = now()->subDays(0)->format('Y-m-d');

        Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Must-have Obsidian plugins - 2024 edition',
            'subheading' => 'Level up your note-taking with these built-in and community plugins',
            'content' => $content2,
            'cover_image' => 'img/home/post-sample-image.jpg',
            'published_at' => $publishedAt2,
            'created_at' => $publishedAt2,
            'updated_at' => $publishedAt2,
        ]);

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

        Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Why you should try Obsidian Sync',
            'subheading' => 'The paid feature is well worth its price',
            'content' => $content3,
            'cover_image' => 'img/obsidian-sync-demo.png',
            'published_at' => $publishedAt3,
            'created_at' => $publishedAt3,
            'updated_at' => $publishedAt3,
        ]);

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

            <a href=\"#!\"><img class=\"img-fluid\" src=\"" . url('/img/home/post-sample-image.jpg') . "\" alt=\"...\" /></a>

            <span class=\"caption text-muted\">To go places and do things that have never been done before – that’s what living is all about.</span>

            <p>Note-taking is our vessel for exploring the final frontier of knowledge. It allows us to boldly go where no one has gone before, uncovering new insights and pushing the boundaries of human understanding.</p>

            <p>As I stand here, surrounded by the wonders of the unknown, I realize that note-taking is the key to unlocking the secrets of the universe. It is through this practice of capturing and reflecting that we can truly explore the depths of our own potential and the mysteries of the world around us.</p>
        ";

        $publishedAt4 = now()->subDays(1)->format('Y-m-d');

        Post::create([
            'user_id' => User::factory()->create()->id,
            'title' => 'Man must explore, and this is exploration at its greatest',
            'subheading' => 'Problems look mighty small from 150 miles up',
            'content' => $content4,
            'cover_image' => 'img/home/post-sample-image.jpg',
            'published_at' => $publishedAt4,
            'created_at' => $publishedAt4,
            'updated_at' => $publishedAt4,
        ]);

        // Create additional random posts
        Post::factory(27)->create();
    }
}
