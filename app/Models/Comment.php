<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'user_id', 'post_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'comment_likes', 'comment_id', 'user_id');
    }
    

    public static function mostCommentedPost()
    {
        return Post::select('posts.id', 'posts.title', 'posts.content')
            ->join('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id', 'posts.title', 'posts.content')
            ->orderByRaw('COUNT(comments.id) DESC')
            ->first();
    }
    

    public static function mostRepeatedWord()
    {
        // Get all comments and split them into words
        $comments = Comment::select('text')->get();
        $words = [];
        foreach ($comments as $comment) {
            $commentWords = str_word_count($comment->text, 1);
            $words = array_merge($words, $commentWords);
        }

        // Count word occurrences
        $wordCounts = array_count_values($words);

        // Find the most repeated word
        arsort($wordCounts);
        $mostRepeatedWord = key($wordCounts);

        return $mostRepeatedWord;
    }
}