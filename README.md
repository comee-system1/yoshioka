### build方法
npm run watch コマンドで自動ビルド


## やったこと
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
