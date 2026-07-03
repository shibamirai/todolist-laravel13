<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    /** @use HasFactory<\Database\Factories\TodoItemFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isExpired(): bool
    {
        return is_null($this->finished_date) && now()->gt(Carbon::parse($this->expire_date));
    }

    #[Scope]
    public function itemNameLike(Builder $query, ?string $str): void
    {
        if ($str) {
            $query->where('item_name', 'like', '%'.$str.'%');
        }
    }

    #[Scope]
    public function userNameLike(Builder $query, ?string $str): void
    {
        if ($str) {
            $query->whereHas('user', fn ($query) =>
                $query->where('family_name', 'like', '%'.$str.'%')
                    ->orWhere('first_name', 'like', '%'.$str.'%')
            );
        }
    }
}
