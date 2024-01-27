<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
  
protected $primaryKey = [
'following_user_id',
'followed_user_id'
];

protected $fillable = [
'following_user_id',
'followed_user_id'
];

protected $table = 'follow_users'; 
  
public $timestamps = false;
public $incrementing = false;

}
