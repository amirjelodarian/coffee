<?php

namespace App\Models;

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'message'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name ?? 'مشتری';
    }

    public function getMessageAttribute($message)
    {
        $text = nl2br($message);
        $data = preg_replace("/[\r\n]*/","",$text);
        return $this->escapeValue($data);
    }

    public function escapeValue($value,$giveInt = false)
    {
        if ($giveInt == true)
            settype($value,'integer');
        $value = addslashes($value);
        return $value;
    }

    public function getCreatedAtAttribute($createdAt)
    {
        return Verta::instance($createdAt);
    }
}
