<div class="footer pc">
    <div class="navigation"><!--底部菜单导航-->
        <?php if ($menu = CustomMenu()): ?>
        <?php echo $menu['noIcon']; ?>
        <?php endif; ?>
    </div>
    <div class="copyright">
        Copyright&copy;<?php if (!empty($this->options->Webtime)): echo $this->options->Webtime().'-'; ?><?php endif; ?><?php echo date('Y'); ?>&nbsp;&nbsp;All Rights Reserved.&nbsp;&nbsp;Load：<?php echo timer_stop();?><br>
            <?php if (!empty($this->options->WA)): ?>
                <img src="<?php $this->options->themeUrl('/static/img/beian.png'); ?>"/><a href="https://beian.mps.gov.cn" rel="nofollow noreferrer" target="_blank"><?php $this->options->WA(); ?></a>&nbsp;&nbsp;
            <?php endif; ?>
            <?php if (!empty($this->options->ICP)): ?>
                <a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow noreferrer"><?php $this->options->ICP(); ?></a><br>
            <?php endif; ?>
            Theme by <a id="copyright-pc" href="https://oneblog.net/oneblog" title="自豪地使用OneBlog主题" target="_blank">OneBlog</a> V<?php echo parseThemeVersion();?>         
            <div class="switch">
                <span>夜间模式</span>
                <input type="checkbox" id="night2" class="night-toggle">
                <label for="night2" class="switchBtn"></label>
            </div>
    </div>
    <div class="contact">
        <?php if (!empty($this->options->QQ)): ?>
        <a id="qq" title="QQ"><i class="iconfont icon-qq"></i></a>
        <?php endif; ?>
        <?php if (!empty($this->options->Weixin)): ?>
        <a id="wxmp" title="微信公众号"><i class="iconfont icon-wechat"></i></a>
        <?php endif; ?>
        <?php if (!empty($this->options->Email)): ?>
        <a id="tomail" title="博主邮箱"><i class="iconfont icon-mail"></i></a>
        <?php endif; ?>
        <?php if (!empty($this->options->Github)): ?>
        <a href="<?php $this->options->Github();?>" target="_blank" title="Github"><i class="iconfont icon-github"></i></a>
        <?php endif; ?>
    </div>
</div>


<?php $this->footer();?>
<script src="<?php $this->options->themeUrl('/static/sdk/jquery.min.js'); ?>"></script><!--基础依赖放在最前面-->
<script src="<?php $this->options->themeUrl('/static/sdk/fancybox3/jquery.fancybox.min.js'); ?>"></script><!--图片灯箱效果-->
<script src="<?php $this->options->themeUrl('/static/sdk/layer/layer.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/static/sdk/swiper/swiper-bundle.min.js'); ?>"></script>
<?php if ($this->is('index')):?>
<script>
var bannerSwitch = '<?= $this->options->switch === 'on' ? 'on' : 'off' ?>';
</script>
<?php endif;?>
<?php if ($this->is('post') || $this->is('page')): ?>
<?php if ($this->options->BeCode == 'on'):?>
<!--代码高亮逻辑-->
<script src="<?php $this->options->themeUrl('/static/sdk/highlightjs/highlight.min.js'); ?>"></script>
<script defer>
document.addEventListener('DOMContentLoaded', function () {
    const codeBlocks = document.querySelectorAll('pre code');
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                hljs.highlightElement(entry.target);
                observer.unobserve(entry.target); 
            }
        });
    }, {
        rootMargin: '0px',
        threshold: 0.1 // 当代码块进入视口 10% 时触发，减少资源占用
    });

    codeBlocks.forEach(function (codeBlock) {
        observer.observe(codeBlock); 
        codeBlock.style.filter = 'none'; // 显示高亮后的代码块
    });
});
</script>
<?php endif;?>

<!--表情支持-->
<script src="<?php $this->options->themeUrl('/static/js/emoji.js'); ?>"></script>

<!--评论无限加载js-->
<script src="<?php $this->options->themeUrl('/static/js/comments.js'); ?>"></script>

<?php endif;?>

<script src="<?php $this->options->themeUrl('/static/js/main.js?v=3.6.1'); ?>"></script><!--主题js-->

<!-- 版权信息 -->
<div id="copyright-info" style="display: none;">
<p>开源不易，请尊重作者版权，保留基本的版权信息。</p>
</div>

<script type="text/javascript">
$(document).on('click', '#qq', function() {layer.msg('<?php $this->options->QQ();?>',{time:4000});});    	
$(document).on('click', '#wxmp', function() {layer.open({type: 1,title: false,closeBtn: 0,shadeClose: true,skin: 'layui-layer-nobg',area: ['auto'], content: '<img id= "mywxmp" style="width:20rem;height:20rem;display:block;" src="<?php $this->options->Weixin();?>">'});});
$(document).on('click', '#tomail', function() {layer.msg('联系邮箱：<?php $this->options->Email();?>',{time:4000});});    	
</script>


<script>
var $NZMenuData = <?php echo json_encode(getNZMenuData()); ?>;
$(function () {var newItems = [];
// 动态生成菜单项
for (var i = 0; i < $NZMenuData.length; i++) {var item = $NZMenuData[i];newItems.push({name: item.name,event: (function(item) {return function(){window.location.href = item.url;};})(item),icon: item.icon});}
// 只在PC端添加搜索按钮
    if (window.innerWidth >= 768) {
        newItems.push(
            {name: "搜索",event: function() {
                openSearch(); // 自动聚焦输入框
                    setTimeout(() => {
                        $('.search-layer .input').focus();
                    }, 350);
                },icon: "iconfont icon-search"
            }
        );
    }

$("html").NZ_Menu({items: newItems});});
</script>

<!--自定义JS代码-->
<?php if (!empty($this->options->JS)): ?>
<?php $this->options->JS();?>
<?php endif; ?>
</body>
</html>