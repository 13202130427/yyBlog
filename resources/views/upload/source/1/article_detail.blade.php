<ul class="infos">
    <p><h2>了解PHP-CLI</h2></p>
    <p><strong>ClI SAPI（服务端应用编程端口）</strong></p>
    <p>cli其实就是PHP命令行模式，我们在刚学PHP的时候用命令行 php helloword.php 其实就是用的cli模式</p>
    <p><strong>ClI的优势</strong></p>
    <p>和fpm不同，cli提供了PHP应用充当后端应用的可能性，首先是cli是支持多线程的，我们所知fpm在浏览器发送请求，会经过nginx分发再到我们的服务器，而cli直接跳过了这一步，自己监听端口，极大的提高了性能，PHPer中出名的SWOOLE就是cli模式，使得php不再局限于WEB端</p>
    <p><strong>ClI的不足</strong></p>
    <p>现阶段CLI模式还不成熟，并不稳定在后续PHP8中JIT将会增强CLI模式</p>
</ul>
