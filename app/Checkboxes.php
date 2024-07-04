<?php

namespace App;

use Illuminate\Support\Facades\Redis;

class Checkboxes
{
    public function set(int $index, bool $checked)
    {
        Redis::SETBIT('state', $index, (int) $checked);
    }

    public function count()
    {
        return Redis::BITCOUNT('state');
    }

    public function all()
    {
        $bitmap = '';

        foreach (str_split(Redis::GET('state')) as $char) {
            $bitmap .= str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT);
        }

        return $bitmap;
    }
}
