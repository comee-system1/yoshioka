<template>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12 blog-main">

                <div class="blog-post mt-3">
                    <h3>お知らせ情報</h3>
                    <p class="blog-post-meta">2022年1月10日</p>
                    <p class="h5">サンプルお知らせタイトル</p>
                    <p>サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。</p>
                    <hr>
                    <p class="blog-post-meta">2022年1月9日</p>
                    <p class="h5">サンプルお知らせタイトル</p>
                    <p>サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。</p>
                    <hr>
                    <p class="blog-post-meta">2022年1月3日</p>
                    <p class="h5">サンプルお知らせタイトル</p>
                    <p>サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。サンプルお知らせ。</p>
                    <hr>
                </div>
                <div class="blog-post mt-3">

                    <h3>開催日時・場所</h3>
                    <p>{{seminer.st_op_date_format}}</p>
                    <p class="h4">住所</p>
                    <p>{{seminer.address}}</p>
                    <p class="h4">場所</p>
                    <iframe v-bind:[attribute]="url" height="200" style="border:0;width:100%;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <div class="blog-post">
                    <h2 class="blog-post-title">協賛企業</h2>
                    <div class="row">
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100" /></a></div>
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100"/></a></div>
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100"/></a></div>
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100"/></a></div>
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100"/></a></div>
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100"/></a></div>
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100"/></a></div>
                        <div class="col-md-2"><a href=""><img src="https://forest.watch.impress.co.jp/img/wf/docs/1158/361/image18120702_l.png" class="w-100"/></a></div>
                    </div>
                </div><!-- /.blog-post -->


            </div><!-- /.blog-main -->
        </div><!-- /.row -->

    </main><!-- /.container -->
</template>
<script>
export default {
    props:['seminer'],
    data(){
        return {
            attribute: 'src',
	        url: 'https://www.google.com/maps?output=embed&z=15&q='+this.seminer.address
        }
    },
}
</script>
