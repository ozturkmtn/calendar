<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar_event';
    protected $primaryKey = 'id';
    public $timestamp = false;

}
