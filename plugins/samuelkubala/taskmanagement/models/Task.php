<?php

namespace SamuelKubala\TaskManagement\Models;

use October\Rain\Database\Model;

/**
 * Task Model
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'samuelkubala_taskmanagement_tasks';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name', 'plannedstart', 'plannedend', 'plannedduration', 'project_id'];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name' => 'required|alpha_dash|max:32|min:3|unique:samuelkubala_taskmanagement_tasks',
        'plannedduration' => 'nullable|integer|min:0',
        'project_id' => 'nullable|integer|min:0'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = ['entries' => ['samuelKubala\timeentrymanagement\models\timeentry', 'key' => 'task_id']];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    //test ci mozem pouzit velke pismena
    public $belongsTo = ['project' => ['SamuelKubala\Project\Models\Project', 'key' => 'id', 'otherKey' => 'project_id']];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
