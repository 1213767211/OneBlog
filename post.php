<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>

<div class="main">
<?php $this->need('module/head2.php');?>
<?php if($this->fields->thumb): ?>

<!--有封面图的文章详情页顶部样式-->
    <div class="post_thumb blur">
        <!-- 背景图片容器 -->
        <div class="post_bg lazy-load" data-src="<?php $this->fields->thumb();?>"></div>
        <div class="pc">
            <!-- 新增的菜单按钮 -->
            <i class="iconfont icon-nav menu-button"></i>
            <!-- 内容容器保持不变 -->
            <div class="post_header padding animated fadeIn">
                <?php $firstCat = $this->categories[0]; ?>
                <a href="<?php echo $firstCat['permalink']; ?>"><?php echo $firstCat['name']; ?></a>
                <h1><?php $this->title() ?></h1>   
                <div class="post_meta">
                    <span><?php $this->date('Y.m.d'); ?></span>
                    <span>/</span>
                    <span><?php get_post_view($this) ?>&nbsp;阅读</span>
                    <span>/</span>
                    <span><?php $this->commentsNum('0 评论', '1 评论', '%d 评论'); ?></span>
                    <span>/</span>
                    <span><?php echo art_count($this->cid); ?>&nbsp;字</span>
                </div>
            </div>
        </div>
    </div>
    <div class="m blur">
        <!--当前文章所属分类 只取第一个分类-->
        <div class="category">
            <?php $firstCat = $this->categories[0]; ?>
            <a href="<?php echo $firstCat['permalink']; ?>"><?php echo $firstCat['name']; ?></a>
        </div>
        
        <!--文章标题和统计-->
        <div class="post_info">
            <h1><?php $this->title();?></h1>   
            <span>阅读&nbsp;<?php get_post_view($this) ?></span>
            <span><?php $this->commentsNum('评论 0', '评论 1', '评论 %d'); ?></span>
            <span>发表于<?php $this->date('Y.m.d'); ?></span>
        </div>
    </div>
    
    <?php else: ?>
    <!--没有封面图的文章详情页顶部样式-->
    <div class="post_nothumb blur animated fadeIn">
        <div class="breadcrumb">
            <li><a href="<?php $this->options->siteUrl(); ?>">首页</a><span>&gt;</span></li>
            <li><?php $firstCat = $this->categories[0]; ?><a href="<?php echo $firstCat['permalink']; ?>"><?php echo $firstCat['name']; ?></a><span>&gt;</span></li>
            <li>正文</li>
        </div>
        <div class="pc">
            <i class="iconfont icon-nav menu-button"></i>
        </div>
        <h1><?php $this->title() ?></h1>   
        <div class="post_meta">
            <span><?php $this->date('Y年m月d日'); ?></span>
            <span><?php get_post_view($this) ?>&nbsp;阅读</span>
            <span><?php $this->commentsNum('0 评论', '1 评论', '%d 评论'); ?></span>
            <span><?php echo art_count($this->cid); ?>&nbsp;字</span>
        </div>
    </div>
    <?php endif;?>
    <!--通用文章正文-->
    <div class="post_content padding blur animated fadeIn">
        <?php echo AutoLightbox($this->content);?>
        <div class="cc-say">
            本文著作权归作者 [&nbsp;<span><?php if($this->fields->author){ $this->fields->author();}else{$this->author();}?></span>&nbsp;] 享有，未经作者书面授权，禁止转载，封面图片来源于 [&nbsp;<span><?php echo $this->fields->origin ? $this->fields->origin : '互联网' ;?></span>&nbsp;] ，本文仅供个人学习、研究和欣赏使用。如有异议，请联系博主及时处理。
        </div>
        <?php if ($this->tags) { ?>
        <div class="tags"><?php $this->tags('', true); ?></div>
        <?php } ?>
    </div> 
    <!--通用文章评论-->
    <?php $this->need('comments.php'); ?>



</div>
<!--返回顶部-->
<a id="gototop" class="hidden pc"><i class="iconfont icon-up"></i></a>
    



<?php $this->need('footer.php'); ?>

