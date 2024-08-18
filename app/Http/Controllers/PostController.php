<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use HTMLPurifier;
use HTMLPurifier_Config;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $oldestPost = Post::oldest()->with('tags')->first();
        $latestPosts = Post::latest()->take(3)->with('tags')->get();
        return view('welcome', compact('oldestPost', 'latestPosts'));
    }

    public function indexMain(Request $request)
    {
        $query = Post::query();

        if ($request->has('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                ->orWhere('subheading', 'LIKE', "%{$searchTerm}%")
                ->orWhereRaw("MATCH(title, subheading) AGAINST(? IN BOOLEAN MODE)", [$searchTerm]);
            });
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'recent':
                    $query->orderBy('published_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('published_at', 'asc');
                    break;
                case 'title':
                    $query->orderBy('title');
                    break;
            }
        }

        $posts = $query->with('tags')->paginate(10);
        $tags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        return view('main', compact('posts', 'tags'));
    }

    public function search(Request $request)
    {
        $query = Post::query();

        if ($request->has('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                ->orWhere('subheading', 'LIKE', "%{$searchTerm}%")
                ->orWhereRaw("MATCH(title, subheading) AGAINST(? IN BOOLEAN MODE)", [$searchTerm]);
            });
        }

        $sort = $request->input('sort', 'recent');

        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title':
                $query->orderBy('title');
                break;
            default:
                $query->latest();
                break;
        }

        $posts = $query->paginate(10);

        return view('main', compact('posts'));
    }

    public function postsByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->with('tags')->paginate(10);
        $tags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        return view('main', compact('posts', 'tag', 'tags'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function random()
    {
        $post = Post::inRandomOrder()->first();
        
        if ($post) {
            return redirect()->route('posts.show', $post->slug);
        } else {
            return redirect()->route('home')->with('message', 'No posts available.');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subheading' => 'nullable|string|max:255',
            'content' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => ['nullable', 'regex:/^[a-zA-Z0-9, ]*$/'],
        ]);

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $cleanContent = $purifier->purify($validatedData['content']);

        $slug = Str::slug($validatedData['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->subheading = $validatedData['subheading'];
        $post->content = $cleanContent;
        $post->user_id = Auth::id();
        $post->slug = $slug;
        $post->published_at = now();


        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('cover_images', 'public');
            $post->cover_image = $path;
        } else {
            $post->cover_image = $validatedData['cover_image'];
        }

        $post->save();

        if (!empty($validatedData['tags'])) {
            $tags = explode(',', $validatedData['tags']);
            foreach ($tags as $tag) {
                $tag = Tag::firstOrCreate(['name' => trim($tag)]);
                $post->tags()->attach($tag->id);
            }
        }

        return redirect()->route('posts.show', $post->slug)->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subheading' => 'max:255',
            'content' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $cleanContent = $purifier->purify($validatedData['content']);

        $post->fill($validatedData);
        $post->content = $cleanContent;
        $post->slug = Str::slug($post->title);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('cover_images', 'public');
            $post->cover_image = $path;
        }

        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);
            $count = 2;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = Str::slug($request->title) . '-' . $count;
                $count++;
            }
            $post->slug = $slug;
        }

        $post->save();

        return redirect()->route('posts.show', $post->slug)->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully.');
    }
}
