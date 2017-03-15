<?php

namespace Xlstudio\Hupun;

use Illuminate\Support\ServiceProvider;

class HupunServiceProvider extends ServiceProvider
{
    /**
    * 服务提供者加是否延迟加载.
    *
    * @var bool
    */
    protected $defer = false;
    
    /**
    * 启动程序事件
    *
    * @return void
    */
    public function boot()
    {
        $this->publishes([
        __DIR__.'/../config/hupun.php' => config_path('hupun.php'),
        ]);
        
        $this->mergeConfigFrom(__DIR__.'/../config/hupun.php', config_path('hupun'));
    }
    
    /**
    * 注册服务提供者
    *
    * @return void
    */
    public function register()
    {
        $this->app->singleton('hupun', function ($app) {
            return new HupunClient($app['config']['hupun']['api_key'], $app['config']['hupun']['api_serect'], $app['config']['hupun']['api_options']);
        });
    }
    
    /**
    * 获取由提供者提供的服务.
    *
    * @return array
    */
    public function provides()
    {
        return ['hupun'];
    }
}
