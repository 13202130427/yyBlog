<ul class="infos">
    <p><h2>了解PHP-FPM</h2></p>
    <p><strong>cgi</strong></p>
    <p>php一开始对过来的请求都是先创建一个进程，读php.ini的配置，初始化环境，返回数据，删除进程，过程繁琐且会影响性能</p>
    <p><strong>fast-cgi</strong></p>
    <p>创建一个主进程，让主进程读取配置，初始化环境，然后fork出多个工作进程，当请求过来由主进程分配给工作进程就可以避免多余的操作</p>
    <p><strong>php-fpm</strong></p>
    <p>由于fast-cgi只是一个cgi程序不能直接管理进程，所以有了php-fpm来进行管理</p>
    <p><strong style="color:red;">php-fpm的三种模式</strong></p>
    <p>static(静态分配)</p>
    <p>FPM根据pm.max_children固定工作进程数 在面临持续性的高并发状态下首选</p>
    <p>dynamic(动态分配)</p>
    <p>FPM根据pm.start_servers ~ pm.max_children之间动态分配工作进程 没有请求进来只会fock设置的开始进程数 常用</p>
    <p>ondemand(按需分配)</p>
    <p>FPM根据pm.max_children固定工作进程数,根据pm.process_idle_timeout指明空闲时间将进程kill掉，没有请求进来工作进程数为0 访问量低时使用节省资源</p>
    <p><strong style="color:red;">面对高并发性能排序 ondemand < dynamic < static</strong></p>
    <p>&nbsp;<img src="/uploads/images/fpm.png" alt="composer思维导图" width="700" ></p>
</ul>
