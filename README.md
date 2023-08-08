# laravel-hupun

为 Laravel 提供的万里牛 ERP 开放接口能力的 PHP SDK
## 安装方法

```shell
composer require xlstudio/laravel-hupun
```
### 注意：以下配置是 Laravel 5.5 以下版本的配置，5.5 以上的版本(包括 5.5)无需配置直接看第 3 条

1. composer 安装或更新之后，把 HupunServiceProvider 添加到 `config/app.php`

```php
'providers' => [
	Xlstudio\Hupun\Providers\HupunServiceProvider::class,
],
```

2. 如果你想使用 Facade 把下面的添加到 `config/app.php`:

```php
'aliases' => [
	'Hupun' => Xlstudio\Hupun\Facades\Hupun::class,
	'HupunOpen' => Xlstudio\Hupun\Facades\HupunOpen::class,
],
```
_注意：以上配置是 Laravel 5.5 以下版本的配置，5.5 以上的版本(包括 5.5)无需配置_


3. 通过运行下面命令把配置文件发布到项目配置里：

```bash
php artisan vendor:publish --provider="Xlstudio\Hupun\Providers\HupunServiceProvider"
```

## 使用方法
在 `.env` 文件里添加以下配置项：

```shell

HUPUN_B2C_APP_KEY     = 填写你申请的 B2C 的 appKey
HUPUN_B2C_APP_SERECT  = 填写你申请的 B2C 的 appSecret
HUPUN_B2C_API_URL     = 万里牛正式环境或测试环境的 B2C API 地址

HUPUN_OPEN_APP_KEY    = 填写你申请的 OPEN 的 appKey
HUPUN_OPEN_APP_SERECT = 填写你申请的 OPEN 的 appSecret
HUPUN_OPEN_API_URL    = 填写你万里牛正式环境或测试环境的 OPEN API 地址

```

B2C 商品推送的接口 ( items/open )

```php
use Hupun;

$item['shopNick'] = '你的店铺昵称'; // 万里牛 ERP 中 B2C 平台的店铺昵称( 掌柜旺旺/账号 ID )
$item['itemID'] = '商品ID';
$item['title'] = '商品标题';
$item['itemCode'] = '商品编码';
$item['price'] = 100.00; // 单价
$item['itemURL'] = '商品地址';
$item['imageURL'] = '图片地址';
$item['status'] = 1; // 0：已删除，1：在售
$item['createTime'] = time() * 1000; // 创建时间，毫秒级时间戳 (13 位毫秒级)
$item['modifyTime'] = time() * 1000; // 最新修改时间，毫秒级时间戳 (13 位毫秒级)

$item['skus'] = []; // 规格集，如果是单规格需传入 []

$items[] = $item; // 商品集

$params['items'] = json_encode($items); // 商品集 json 串

// 以下两种方式任选其一
$result = Hupun::execute('items/open', $params, 'post');

$result = hupun('b2c')->execute('items/open', $params, 'post');

var_dump($result);

```

OPEN 商品推送的接口 ( erp/goods/add/item ) [ 注意：OPEN 和 B2C 的接口及密钥需要各自申请，不能混用 ]

```php
use HupunOpen;

$item['article_number'] = '货号';
$item['item_name'] = '商品名称';
$item['item_code'] = '商品编码';
$item['remark'] = '商品备注';
$item['prime_price'] = 50.00; // 参考进价——如果有规格，会忽略，即使规格集中的没有传
$item['sale_price'] = 100.00; // 标准售价——如果有规格，会忽略，即使规格集中的没有传
$item['item_pic'] = '图片地址';

$params['item'] = json_encode($item); // 商品信息 json 串

// 以下两种方式任选其一
$result = HupunOpen::execute('erp/goods/add/item', $params, 'post');

$result = hupun('open')->execute('erp/goods/add/item', $params, 'post');

var_dump($result);

```

B2C 单笔查询库存的接口 ( inventories/erp/single )

```php
use Hupun;

$params['shop_type'] = 100; // 店铺类型，B2C 平台：100
$params['shop_nick'] = '你的店铺昵称';  // 万里牛 ERP 中 B2C 平台的店铺昵称( 掌柜旺旺/账号 ID )
$params['item_id'] = '商品ID'; // 商品编号，对应商品推送中的 itemID
$params['sku_id'] = '规格ID'; // 如果商品含规格，则必填，对应商品推送的中 skuID

// 以下两种方式任选其一
$result = Hupun::execute('inventories/erp/single', $params, 'get');

$result = hupun('b2c')->execute('inventories/erp/single', $params, 'get');

var_dump($result);

```
如果你是使用其他框架或者原生编写的，可以参考使用：
> https://github.com/xlstudio/hupun

使用本 SDK 过程中如有问题，请联系作者协助解决：[ QQ: 2019809069, WECHAT: 2019809069 ]

请他喝杯咖啡

![喝杯咖啡](buymeacoffee.png)

###### _( 如遇公司没有相关技术人员，可以联系作者沟通技术外包 )_