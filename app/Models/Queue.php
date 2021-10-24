<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','service_id','employee_id','number','start','end','status'];

    protected static function booted()
    {
        // static::creating(function(Queue $queue){
        //     $now = Carbon::now();
        //     $number = Queue::whereYear('created_at','=',$now->year)->max('number');
        //     $queue->number = $number ? $number + 1 : $now->year .'0001';
        // });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(employee::class);
    }
}
