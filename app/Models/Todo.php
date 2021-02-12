<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class)->first();
    }
    public function listCol()
    {
        return $this->belongsTo(ListCol::class)->first();
    }
    public static function getHighestYPos($user, $list, $val = null)
    {
        if ($val === null) {
            $todoCollection = Todo::where(['user_id' =>  $user, 'list_col_id' => $list])->get();
            if (!$todoCollection->isEmpty()) {
                $val = $todoCollection->sortByDesc('y_position')->first()->y_position;
            } else {
                $val = 0;
            }
        }
        return $val;
    }
}
