<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    const DOING_STATUS = 'doing';
    const DONE_STATUS = 'done';
    use SoftDeletes;
    protected $guarded = [];

    //
}
