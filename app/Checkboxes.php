<?php

namespace App;

use Illuminate\Support\Facades\Redis;

class Checkboxes
{
    public function set(int $index, bool $checked)
    {
        Redis::SETBIT('state', $index, (int) $checked);
    }
}
