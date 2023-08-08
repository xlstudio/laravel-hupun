<?php

namespace Xlstudio\Hupun\Providers;

use Xlstudio\Hupun\HupunClient;
use Illuminate\Support\ServiceProvider;

class HupunServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * 启动程序服务.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/hupun.php' => config_path('hupun.php'),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../../config/hupun.php', 'hupun');
    }

    /**
     * 注册服务提供者.
     */
    public function register()
    {
        $this->app->singleton('hupun', function ($app) {
            $appKey                 = $app['config']['hupun']['b2c_app_key'];
            $appSecret              = $app['config']['hupun']['b2c_app_serect'];
            $option['api_url']      = $app['config']['hupun']['b2c_api_url'];
            $option['api_work_dir'] = $app['config']['hupun']['b2c_api_work_dir'];

            return new HupunClient($appKey, $appSecret, $option);
        });

        $this->app->singleton('hupunOpen', function ($app) {
            $appKey                 = $app['config']['hupun']['open_app_key'];
            $appSecret              = $app['config']['hupun']['open_app_serect'];
            $option['api_url']      = $app['config']['hupun']['open_api_url'];
            $option['api_work_dir'] = $app['config']['hupun']['open_api_work_dir'];

            return new HupunClient($appKey, $appSecret, $option);
        });
    }

    /**
     * 获取由提供者提供的服务.
     *
     * @return array
     */
    public function provides()
    {
        return ['hupun', 'hupunOpen'];
    }
}
