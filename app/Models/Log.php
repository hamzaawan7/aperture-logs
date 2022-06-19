<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * @package App\Models
 *
 * @property string param
 * @property int position
 */
class Log extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'logs';

    /**
     * @var bool $timestamps
     */
    public $timestamps = false;
}
