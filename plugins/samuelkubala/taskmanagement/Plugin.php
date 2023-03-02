<?php

namespace SamuelKubala\TaskManagement;

use Backend;
use System\Classes\PluginBase;

/**
 * TaskManagement Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = ['SamuelKubala.Project'];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'TaskManagement',
            'description' => 'No description provided yet...',
            'author'      => 'SamuelKubala',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'SamuelKubala\TaskManagement\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'samuelkubala.taskmanagement.some_permission' => [
                'tab' => 'TaskManagement',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'taskmanagement' => [
                'label'       => 'TaskManagement',
                'url'         => Backend::url('samuelkubala/taskmanagement/tasks'),
                'icon'        => 'icon-calendar',
                'permissions' => ['samuelkubala.taskmanagement.*'],
                'order'       => 500,
            ],
        ];
    }
}
