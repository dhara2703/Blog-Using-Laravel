<?php


namespace App;

use Carbon\Carbon;

// use Illuminate\Database\Eloquent\Model; ---------- We don't need this as we have a parent model which extends from Eloquent

class Post extends Model
{
    // Video 11 - The fillable varible makes sure that only this values will be assigned to mass assignment
    // fillable accepts this parameters and whitelist them
    // protected $fillable = ['title', 'body']; 


    // Opp of fillable - it will make sure that the given parameter will not be allowed to store in database, 
    //                   other than thaat all other parameters will be stored
    // protected $guarded = ['user_id'];

    // protected $guarded = [];

    // Rather than declaring here we will create a parent model file for using it on all files

    public function comments()
    {
        // return $this->hasMany('App\Comment');
        return $this->hasMany(Comment::class);

    }

    // This tells which comment is associated with which post and who is the user of that post
    // $comment->post->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function addComment($body)
    {

        // $this->comments()->create();

        // $this->comments()->create(['body' => $body]); 
        $this->comments()->create(compact('body'));

        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id
        // ]);
    }

    public function scopeFilter($query, $filters)
    {
        //Video 20
        // $posts =  Post::latest();

        // if($month = request('month')) {

        //     // $posts->whereMonth('created_at', 10); // March => 3, May => 5
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month); // March => 3, May => 5

        // }

        // if($year = request('year')) {

        //     $posts->whereYear('created_at', $year);
            
        // }

        //$posts = $posts->get();

         $posts =  Post::latest();

        if($month = $filters['month']) {

            // $posts->whereMonth('created_at', 10); // March => 3, May => 5
            $query->whereMonth('created_at', Carbon::parse($month)->month); // March => 3, May => 5

        }

        if($year = $filters['year']) {

            $query->whereYear('created_at', $year);
            
        }
    }


    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                ->groupBy('year','month')
                ->orderByRaw('min(created_at) desc')
                ->get()
                ->toArray();
    } 

    public function tags()
    {
        // 1 post can have many tags
        // Any tag can may be apply to many posts 
        // Any posts can may be apply to many tags 
        return $this->belongsToMany(Tag::class);
    }

}
