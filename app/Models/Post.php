<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Finder\SplFileInfo;

class Post
{
    function __construct(
        public $title,
        public $excerpt,
        public $date,
        public $body,
        public $slug,
    ) {
    }

    public static function all()
    {
        return collect(File::files(resource_path('posts')))
            ->map(function (SplFileInfo $file) {
                $filename = $file->getFileName();
                $document = YamlFrontMatter::parseFile(
                    resource_path("posts/{$filename}")
                );
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                );
            })->sortByDesc('date');
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
