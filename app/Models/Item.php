<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Helpers\UUIDHelper;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Notifiable, UUIDHelper, HasApiTokens;
    
    protected $table = "items";

    protected $guarded = [
        "id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}