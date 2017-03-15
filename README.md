# laravel-hupun
万里牛ERP开放接口为 Laravel 提供的 PHP SDK
## 安装方法
```shell
composer require xlstudio/laravel-hupun dev-master
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
	'Hupun' => Xlstudio\Hupun\Facades\Hunpun::class,
],
```
通过运行下面命令把配置文件发布到项目里：
```bash
php artisan vendor:publish --provider="Xlstudio\Hupun\HupunServiceProvider"
```
## 使用方法
在 `.env` 添加配置项：
```php
HUPUN_API_KEY = 填写你申请的appKey
HUPUN_API_SERECT = 填写你申请的appSecret
HUPUN_API_URL = 填写测试环境接口地址 //正式环境可以去掉该项配置，也可以直接添加正式环境接口地址
```
单笔查询库存的接口
```php
use Hupun;

$params['shop_type'] = 100;
$params['shop_nick'] = 'dangkou';
$params['item_id'] = '1';
$params['sku_id'] = '111-1';

var_dump(Hupun::execute('/inventories/erp/single', $params, 'get'));
```