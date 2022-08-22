<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title','company','user_id','logo','tags','email','location','company_site','description',
    ];
    public function scopeFilter($query,array $filters){

        // Search By Tags
        if($filters['tag']?? false){
            $query->where('tags','like','%'.request('tag').'%');
        }

        // Search By Any Word

        if($filters['search']?? false){
            $query->where('job_title', 'like', '%'.request('search').'%');
            $query->orWhere('description', 'like', '%'.request('search').'%');
            $query->orWhere('company', 'like', '%'.request('search').'%');
            $query->orWhere('tags', 'like', '%'.request('search').'%');
        }

    }

    public function user(){
        return $this->hasMany(Job::class , 'user_id');
    }
}
