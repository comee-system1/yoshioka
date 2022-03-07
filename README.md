### stripeの利用
Stripe向けCashierパッケージをComposerでインストールします。
`composer require laravel/cashier`

### cronの設定
cd /home/blueracoon85/www/yoshioka/; /usr/local/bin/php artisan command:exsample
一斉メール 1時間ごと


### cronの実行コマンド
command
command:exsample      Send an hourly email to all the users
command:requests      セミナーの1or3日前になった際に参加者にメールを送信

`php artisan command:requests 1`
`php artisan command:requests 3` 
- 引数をつける 1:1日前 3:3日前


### サクラサーバーにcomposerのインストール
curl -sS https://getcomposer.org/installer | php
- 確認
php composer.phar
php composer.phar install

- migrate
php artisan migrate


- 初期状態に戻す seedファイルも同時に実行
php artisan migrate:fresh --seed


- キーの作成
php artisan key:generate

### laravel-dompdfパッケージ
composer require barryvdh/laravel-dompdf

- 日本語化
インストールディレクトリにあるstorageディレクトリの下にfontsディレクトリを作成します。
日本語フォントのIPAフォントのダウンロードを行います。URLは、https://moji.or.jp/ipafont/ipa00303/です。
IPAフォントダウンロード
zipファイルとしてダウンロードされるので、解凍後、その中にあるファイルを先ほど作成したstorage/fonts/ディレクトリの下にコピーしてください

### 画像表示の為にシンポリックをはる

PS C:\xampp3\htdocs\yoshioka\yoshioka> php artisan storage:link
The [C:\xampp3\htdocs\yoshioka\yoshioka\public\storage] link has been connected to [C:\xampp3\htdocs\yoshioka\yoshioka\storage\app/public].
The links have been created.


### Formファザードをインストール
- ｉｎｓｔａｌｌコマンド
```
composer require "laravelcollective/html"
```
- composer.jsonに追記されていることを確認
   - "laravelcollective/html": "^6.2"が追記されている


### PHP_CodeSnifferを導入して、git commit時にチェックする
- インストール
composer require --dev squizlabs/php_codesniffer:3.*


echo 'export PATH=$HOME/.composer/vendor/bin:$PATH' >> .bash_profile

● インストールの確認
phpcs --version


```
インストールできたら、vendor/binにphpcsとphpcbfという実行ファイルが存在するはずです
```
- Gitの設定
次にGitフックを使ってgit commit時にphpcsが実行されるようにします。
.git/hooksに以下の内容のpre-commitという名前のシェルスクリプトを作成します。

.git/hooks/pre-commit
```
#!/bin/sh

./vendor/bin/phpcs --standard=PSR12 --filter=GitStaged .
```
- 動作確認

```
PS C:\xampp3\htdocs\yoshioka\yoshioka> git commit -m 'test'

FILE: ...\yoshioka\yoshioka\app\Http\Controllers\Admin\HomeController.php
----------------------------------------------------------------------
FOUND 3 ERRORS AFFECTING 3 LINES
----------------------------------------------------------------------
 17 | ERROR | [x] Opening brace should be on a new line
 23 | ERROR | [ ] Method name "HomeController::to_string" is not in
    |       |     camel caps format
 28 | ERROR | [x] The closing brace for the class must go on the next
    |       |     line after the body
----------------------------------------------------------------------
PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
----------------------------------------------------------------------

```



`https://www.ninton.co.jp/archives/6360`
```
コーディングルールとファイルを指定します。

$ ./vendor/bin/phpcs  --standard=PSR12  foo.php
Code language: Bash (bash)
ディレクトリを指定することもできます。

$ ./vendor/bin/phpcs  --standard=PSR12  ./web/
Code language: Bash (bash)
jsやcssを除外するには、

$ ./vendor/bin/phpcs  --standard=PSR12  ./web/  --ignore="*.js|*.css"
Code language: Bash (bash)
警告の [x] つきのものは、もう一つのコマンド phpcbf で自動修正できます。

$ ./vendor/bin/phpcbf  --standard=PSR12  foo.php

```

- 以下のコマンドで自動補正
   - `PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY`となっているもののみ対象
`./vendor/bin/phpcbf --standard=phpcs.xml ./`



### warning: LF will be replaced by CRLF inが出たときの対処法
`git config --global core.autoCRLF false`

### select2の利用
npm i select2

### jqueryのインストール
npm install jquery --save

### FontAwesome 5.x.xを使えるようにする
npm install @fortawesome/fontawesome-free

### Vue Routerをインストール
npm install vue-router

jsファイルに下記を記載
`import Router from 'vue-router'`


### サーバー接続
axiosの利用
- REST送信ためにインストールします
    - npm install  axios vue-axios
    - npm view axios version

```
PS C:\xampp3\htdocs\yoshioka\yoshioka> npm view axios version
0.24.0
PS C:\xampp3\htdocs\yoshioka\yoshioka>
```




### build方法
npm run watch コマンドで自動ビルド

### 初期
composer update
npm install
php artisan migrate

## やったこと
### bootstrap.css組込み

composer require laravel/ui
php artisan ui bootstrap
npm install
npm run dev




### 認証機能
- fortifyインストール
composer require laravel/fortify
- 関連ファイルを作成
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
- マイグレートを実行します
php artisan migrate
- 設定
app/config/app.phpファイルの177行目あたりに、下記を追加します。
`App\Providers\FortifyServiceProvider::class,`
- 登録とログイン画面設定
app/Providers/FortifyServiceProvider.phpファイルを開きます。

public function boot() に、下記の２つの設定をします

```
   public function boot()
    {
        Fortify::registerView(function () {
            return view('auth.register');
        });
        
        Fortify::loginView(function () {
            return view('auth.login');
        });

```

登録用のビューはresources/view/auth/register.blade.php
ログイン用のビューはresources/view/auth/login.blade.php
が表示される

各ルート設定は php artisan route:list コマンドで確認できます。

### fortifyのログインURLの変更
- FortifyServiceProviderのregisterメソッドにFortify::ignoreRoutes();を追加。
- routesフォルダ内にfortify.phpを作成する
    - vendor\laravel\fortify\routes\routes.phpの中身をコピーして先ほど作成したfortify.phpに貼り付ける。
- RouteServiceProvideにルーティングとして登録する
```
class RouteServiceProvider extends ServiceProvider
{
~ 省略 ~
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            // 追加
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/fortify.php'));
        });
    }
```
fortify.phpを変更する
