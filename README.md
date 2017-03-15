# laravel-hupun
万里牛ERP开放接口为 Laravel 提供的 PHP SDK
## 安装方法
```shell
composer require xlstudio/laravel-hupun dev-master
```
composer 安装或更新之后，把 HupunServiceProvider 添加到 `app/config/app.php`
```php
'providers' => [
	Xlstudio\Hupun\HupunServiceProvider::class,
],
```
如果你想使用 Facade 把下面的添加到 `app/config/app.php`:
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
`
HUPUN_API_KEY = 填写你申请的appKey
HUPUN_API_SERECT = 填写你申请的appSecret
HUPUN_API_URL = 填写测试环境接口地址 //正式环境可以去掉该项配置，也可以直接添加正式环境接口地址
`
单笔查询库存的接口
```php
use Xlstudio\Hupun\HupunClient;

$hupunclient = new HupunClient('填写你申请的appKey','填写你申请的appSecret');
$hupunclient->gatewayUrl = 'http://103.235.242.21/open/api'; // 测试环境，正式环境可以不需要
$hupunclient->hupunSdkWorkDir = './data/'; // 日志存放的工作目录

$params['shop_type'] = 100;
$params['shop_nick'] = 'dangkou';
$params['item_id'] = '1';
$params['sku_id'] = '111-1';

var_dump($hupunclient->execute('/inventories/erp/single', $params, 'get'));
```