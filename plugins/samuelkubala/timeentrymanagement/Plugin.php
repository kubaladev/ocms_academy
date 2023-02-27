<?php namespace SamuelKubala\TimeEntryManagement;

use Backend;
use System\Classes\PluginBase;

/**
 * TimeEntryManagement Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'TimeEntryManagement',
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
            'SamuelKubala\TimeEntryManagement\Components\MyComponent' => 'myComponent',
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
            'samuelkubala.timeentrymanagement.some_permission' => [
                'tab' => 'TimeEntryManagement',
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
        return []; // Remove this line to activate

        return [
            'timeentrymanagement' => [
                'label'       => 'TimeEntryManagement',
                'url'         => Backend::url('samuelkubala/timeentrymanagement/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['samuelkubala.timeentrymanagement.*'],
                'order'       => 500,
            ],
        ];
    }
}
