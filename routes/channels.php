<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('checkboxes', function (User $user) {
    return true;
});
