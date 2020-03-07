# laravel-hupun
为 Laravel 提供的万里牛ERP开放接口的 PHP SDK
## 安装方法
```shell
composer require xlstudio/laravel-hupun
```
composer 安装或更新之后，把 HupunServiceProvider 添加到 `config/app.php`
```php
'providers' => [
	Xlstudio\Hupun\HupunServiceProvider::class,
],
```
如果你想使用 Facade 把下面的添加到 `config/app.php`:
```php
'aliases' => [
	'Hupun' => Xlstudio\Hupun\Facades\Hupun::class,
],
```
通过运行下面命令把配置文件发布到项目配置里：
```bash
php artisan vendor:publish --provider="Xlstudio\Hupun\HupunServiceProvider"
```
## 使用方法
在 `.env` 添加配置项：
```php
HUPUN_TEST_ENV = true # 是否为测试环境(正式环境:false,测试环境:true)
# 测试环境配置
HUPUN_TEST_API_KEY = 填写你申请的appKey
HUPUN_TEST_API_SERECT = 填写你申请的appSecret
HUPUN_TEST_API_URL = http://114.67.231.99/open/api
# 正式环境配置
HUPUN_API_KEY = 填写你申请的appKey
HUPUN_API_SERECT = 填写你申请的appSecret
HUPUN_API_URL = https://erp-open.hupun.com/api
```
单笔查询库存的接口
```php
use Hupun;

$params['shop_type'] = 100;
$params['shop_nick'] = '你的店铺昵称';
$params['item_id'] = '1';
$params['sku_id'] = '111-1';

var_dump(Hupun::execute('/inventories/erp/single', $params, 'get'));
```
如果你是使用其他框架或者原生编写的，可以参考使用：
> https://github.com/xlstudio/hupun

如有不明白的地方，请联系[QQ：2019809069]