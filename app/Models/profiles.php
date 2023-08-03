<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    protected $guarded=[];
    protected $fillable = ['description', 'url','profilePicture'];
    use HasFactory;

    public function profilePicture()
    {
        return ($this->profilePicture) ? '/storage/'.$this->profilePicture : '/storage/profiles/2HuMx8YQp0UMovLaI2LSH10X5c7Dx8yaXrdqNb19.png';
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function followers()
    {

        return $this->belongsToMany(User::class);
    }

}
