<ul class="infos">
    <p><h2>什么是单例模式</h2></p>
    <p>&nbsp;<img src="/uploads/images/singleton.jpg" alt="单例模式" width="700" ></p>
    <p>单例模式就是有且仅有一个实例，该类负责创建自己的对象，同时确保只有一个对象被创建，
        提供一个供外部获取实例的静态方法。</p>
    <p><h2>有什么用</h2></p>
    <p>php主要就是数据库的增删改查，所以一个应用会有大量数据库操作，面对对象编程的时候如果用单例模式可以避免大量new操作消耗资源，因为php的解释运行机制使得每个php页面被解释执行后相关资源都会被回收所以变量，所以单例模式对于php的好处就在与可以避免大量的new操作</p>
    <p><h2>怎么写</h2></p>
    <p><strong>懒汉模式</strong></p>
    <p>
        <textarea style="width: 500px;height: 100px;background-color: #000;color: #fff;">
            class Car
            {
            private static $instance=null;//私有静态属性存放单例
            private function __construct(){}//私有构造方法（防止类外实例化类）
            public static function getInstance(){//公有静态方法提供外界访问
            if(self::$instance==null){
            return self::$instance = new self;
            }
            return self::$instance;
            }

            private function __clone(){}//防止对象被克隆

            }
        </textarea>
    </p>
    <p><h2>在哪用</h2></p>
    <p>例如调用数据库，首先要链接数据库，每次操作数据库都要实例化出不同的实例，用单例模式就省资源</p>
</ul>

