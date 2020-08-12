<ul class="infos">
    <p><h2>了解composer</h2></p>
    <p>&nbsp;<img src="/uploads/images/composer.png" alt="composer思维导图" width="700" ></p>
    <p>composer是PHP5.3以上的一个依赖工具，它允许你声明项目所依赖的代码库并在你的项目中为你安装。日常开发中我们从git上拉取网站源码，通过composer我们可以安装该网站所需要的所有依赖。</p>
    <p><h2>Composer install</h2></p>
    <p>该条命令是我们最常使用的命令，执行该命令，会先检查锁文件（composer.lock）是否存在，如果存在则下载composer.lock中指定的包的版本 ，若不存在则会读取composer.json里的包的规范进行下载</p>
    <p><h2>Composer update</h2></p>
    <p>该条命令主要是用来更新依赖，慎用 执行该命令会直接去读composer.json里的包按照其中的规范将所有的包更新到最新版本 然后修改composer.lock文件 这时若盲目将composer.lock上传到git 将可能导致新更新的版本在线上未做匹配导致网站崩溃</p>
    <p><h2>Composer update vendor/package</h2></p>
    <p>该条命和composer update 一样 不同在于指定了对应的库的依赖并更新到最新到版本</p>
    <p><h2>Composer require</h2></p>
    <p>该条命令可以安装指定版本的库而不需要去编辑composer.json文件</p>
    <p><h2>Composer install 和 composer update的区别</h2></p>
    <p>由此可见,composer install 会先去判断lock文件是否存在，存在会直接执行lock不存在才会去读json文件，而composer update 会直接去读json文件然后修改lock</p>
    <p><h2>Composer require 的数据源</h2></p>
    <p>Composer require 会安装我们制定的库 ，去哪里拉起这个库就跟我们的配置有关，安装composer默认拉取的库是国外的，优点是有很多库在国内镜像不存在缺点就是容易被墙贼鸡儿慢，可以通过修改配置改成国内镜像推荐阿里云会快非常多缺点就是国外刚更新的库我们就拿不到不过也可以满足日常开发需求</p>
    <p><h2>自己写一个composer包</h2></p>
    <p><strong>这个百度上有很多教你写的，我这里就说个大概流程</strong></p>
    <p> 1、首先要有个仓库 现在git上开个仓库 然后本地拉取 （不用啥文件只有一个Read）</p>
    <p> 2、本地项目根目录使用命令 composer init  这一步主要是配置composer会生成composer.json文件</p>
    <p> 3、修改composer.json文件 在自动加载那里配置自己写的库</p>
    <p> 4、Composer update 生成lock文件</p>
    <p> 5、传回git这时一个包基本完成</p>
    <p> 6、把这个包放到packagist上 别人才可以拉取（别人用你的包才有成就感）注册个账号然后有个submit把项目的git地址丢进去 check验证一次 过了再submit一次 就完成了</p>
    <p> 7、包必须要有版本 在本地加个标签传上git 在github上添加版本 ok</p>
    <p> 8、包名一般命名都是作者+项目名 别命名成通俗词不然没办法在packagist上创建</p>
    <p><h2>使用技巧</h2></p>
    <p><strong>修改镜像仓库路径 由于默认安装拉取镜像的仓库都是国外的所以会很慢可切换到国内镜像仓库</strong></p>
    <p>1、composer config -g repo.packagist composer https://packagist.phpcomposer.com 国内镜像</p>
    <p>2、composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/  这条是阿里云的推荐</p>
    <p><strong>composer卡主了不知道在干嘛 后面加上 -vvv 可以看详细情况</strong></p>
</ul>

