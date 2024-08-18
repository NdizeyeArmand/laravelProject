@extends('layouts.guest')

@section('title', 'About')

@section('header-image', asset('img/home/about-bg.jpg'))

@section('header')
<div class="page-heading">
    <h1>{{ __('About Me') }}</h1>
</div>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{ __('Project made with ❤️ by Ndizeye Armand-Gaël for the course Backend Web.') }}</p>
                <p><strong>{{ __('Source code can be found') }} <a href="https://github.com/NdizeyeArmand/laravelProject">{{ __('here') }}</a></strong></p>
                <p>{{ __('This was made possible by:') }}</p>
                <ul>
                    <li><p>
                        Akturk, O. (2024-04). team2 [GitHub repository]. GitHub. Retrieved 2024-06 from <a href="https://github.com/osmanaktrk/team2">https://github.com/osmanaktrk/team2</a>
                    </p></li>
                    <li><p>
                        Anthropic. (2024). Conversation with Claude AI [Computer program]. Retrieved 2024-06 from <a href="https://www.anthropic.com">https://www.anthropic.com</a>
                    </p></li>
                    <li><p>
                        Image: <a href="https://commons.wikimedia.org/wiki/File:Obsidian_desktop_demo_workflow.jpg">Obsidian open with a chemistry note, graph view, and calendar open</a> by 
                        <a href="https://commons.wikimedia.org/w/index.php?title=User:Langstonzac25&action=edit&redlink=1">Langstonzac25</a> is licensed under 
                        <a href="https://creativecommons.org/licenses/by/4.0/">CC BY 4.0</a>.
                    </p></li>
                    <li><p>
                        Jackson. (2023-10-31). Taking notes with Obsidian [Blog article]. Twelve Tables. Retrieved 2024-08 from <a href="https://twelvetables.blog/taking-notes-with-obsidian/">https://twelvetables.blog/taking-notes-with-obsidian/</a>
                    </p></li>
                    <li><p>
                        Obsidian. (n.d.). Blog. Retrieved 2024-06 from <a href="https://obsidian.md/blog/">https://obsidian.md/blog/</a>
                    </p></li>
                    <li><p>
                        Original Mac Guy. (2023-10-31). Obsidian: The Good, The Bad, The Ugly [Image]. GitHub. Retrieved 2024-08 from <a href="https://www.originalmacguy.com/obsidian-the-good-the-bad-the-ugly/">https://www.originalmacguy.com/obsidian-the-good-the-bad-the-ugly/</a>
                    </p></li>
                    <li><p>
                        Phind. (2023). AI tool assistant. Retrieved 2024-06 from <a href="https://www.phind.com">https://www.phind.com</a>
                    </p></li>
                    <li><p>
                        samuelsong70. (2022-07). Obsidian dynamic background image [Image]. GitHub. Retrieved 2024-08 from <a href="https://github.com/samuelsong70/obsidian-dynamic-background">https://github.com/samuelsong70/obsidian-dynamic-background</a>
                    </p></li>
                    <li><p>
                        Start Bootstrap. (2014-09-14). Clean Blog v6.0.9 [Website template]. Retrieved 2024-07 from <a href="https://startbootstrap.com/theme/clean-blog">https://startbootstrap.com/theme/clean-blog</a>
                    </p></li>
                    <li><p>
                        elektor [Image]. Retrieved 2024-08-18 from <a href="https://www.elektormagazine.nl/labs/remake-elektor-weather-station">https://www.elektormagazine.nl/labs/remake-elektor-weather-station</a>
                    </p></li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection