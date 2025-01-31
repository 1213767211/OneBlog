<?php $this->need('custom/Phone/nav.php');?>
<div class="main">
    <div class="content page">
        <div class="top-menu">
            <?php if (array_key_exists('ZeMenu', Typecho_Plugin::export()['activated'])){?>
            <div id="sidebarToggler" class="nav"><i class="iconfont icon-nav"></i></div>
            <?php }?>
            <div class="top-sitename"><a href="/"><img src="<?php echo $this->options->Mlogo ? $this->options->Mlogo : Helper::options()->themeUrl . '/assets/default/logo.svg'; ?>"></a></div>
        </div>
        <div class="header" style="background-image:url('<?php echo $this->fields->thumb ? $this->fields->thumb : Helper::options()->themeUrl . '/assets/default/bg.jpg';?>')">
            <div class="pagetitle">
                <div class="slogan">
                    <h1><?php $this->archiveTitle('','',''); ?></h1> 
                    <span>I saw, I read, I write.</span>
                </div>
            </div>
        </div>
        <div class="post_content">
                <?php $this->content(); ?>    
        </div>
        <?php $this->need('comments.php'); ?>
    </div>
</div>
