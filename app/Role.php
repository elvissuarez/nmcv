<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as OriginalRole;

class Role extends OriginalRole
{
    public $guard_name = 'api';
}
