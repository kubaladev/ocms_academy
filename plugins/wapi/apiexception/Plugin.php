<?php namespace WApi\ApiException;

use Backend;
use Illuminate\Contracts\Http\Kernel;
use System\Classes\PluginBase;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'ApiException',
            'description' => 'No description provided yet...',
            'author'      => 'Wezeo',
            'icon'        => 'icon-leaf'
        ];
    }


    public function boot()
    {
        $this->app[Kernel::class]->prependMiddlewareToGroup('api', ApiExceptionMiddleware::class);
    }
}
