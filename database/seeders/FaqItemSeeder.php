<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq_items')->insert([
            [
                'category_id' => 1,
                'question' => 'What is this website about?',
                'answer' => 'This website is a project made by Ndizeye Armand-Gaël for the Backend Web course. It showcases various features and functionalities implemented using Laravel.',
            ],
            [
                'category_id' => 2,
                'question' => 'Where can I find the source code?',
                'answer' => 'The source code for this project can be found <a href="https://gitlab.com/Dark_Loon/laravelProject">here</a>.',
            ],
            [
                'category_id' => 2,
                'question' => 'What technologies were used to create this website?',
                'answer' => 'This website was created using Laravel, a PHP framework, along with HTML, Tailwind CSS, and JavaScript. The design is based on the <a href="https://startbootstrap.com/theme/clean-blog">Clean Blog</a> theme from Start Bootstrap.',
            ],
            [
                'category_id' => 3,
                'question' => 'How can I contact the developer?',
                'answer' => 'You can contact the developer through their <a href="https://gitlab.com/Dark_Loon">GitLab</a> profile or through the contact form on this website.',
            ],
        ]);
    }
}
