<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    protected $fillable = ['duty_title', 'duty_description', 'duty_created_by', 'duty_assigned_to'];

    use HasFactory;
}
