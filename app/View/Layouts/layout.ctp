

<!DOCTYPE html>
<html>
    <head>
            <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('main'));
        echo $this->Html->script(array('myScript'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <div id="wrap">
        <div id="wrap-container">
            <div id="topnav">
                <h1 id="sitename">Blog</h1>
                <ul id="nav">
                    <li><?php echo $this->Html->link(__('Home'),'/posts/index',array());?></a></li>
                    <li><?php echo $this->Html->link(__('Contact'),'/posts/index',array());?></a></li>
                    <li><?php echo $this->Html->link(__('About us'),'/posts/index',array());?></a></li>
                    <li>
                        <?php
                        if (isset($user)){
                            echo $this->Html->link(__('Logout'),'/users/logout',array());
                        }
                        else
                            echo $this->Html->link(__('Login'),'/users/login',array());
                        ?>
                    </li>
                </ul>
                <ul id="lang">
                    <li>
                        <?php
                        if (isset($user)) {
                            echo $this->Html->link(__('Eng'), array('language' => 'eng'));
                            echo "|";
                            echo $this->Html->link(__('Vie'), array('language' => 'vie'));
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <div id="header">
                <div id="featuredpost">
                    <div id="featuredthumb">
                        <?php echo $this->Html->image('/img/featuredimage.jpg',
                            array(
                                'alt' => 'featuredimage',
                                'class' => 'shadow',
                                'width' => '200',
                                'height' => '135'
                            ));
                        ?>
                    </div>
                    <div id="featuredcontent">
                        <h2><span>Hello World</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit facilisis viverra. Nullam id tristique arcu.
                            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vehicula eros commodo est vestibulum cursus..
                            <span class="readmore">
                  <a href="#"><?php echo __('read more');?></a>
              </span>
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>



        <?php
            echo $this->fetch('content');
        ?>


            <div id="sidebar">
                <div id="search">
                    <h2>Search</h2>
                    <form action="#">
                        <div id="searchfield">
                            <input type="text" name="keyword" class="keyword" />
                        </div>
                    </form>
                </div>
                <div id="sb_container">
                    <h2>
                  <span class="list_user">
                      <?php echo $this->Html->link(__('Add new post'), array('controller' => 'posts','action' => 'add'));?>
                  </span>
                    </h2>
                    <h2>
                  <span class="list_user">
                      <?php echo $this->Html->link(__('List users'), array('controller' => 'users','action' => 'index'));?>
                  </span>
                    </h2>
                    <h2><span class="list_user">
                            <?php echo $this->html->link(__('Older Posts'), '#', array('onclick'=>'return false;')); ?>
                        </span></h2>
                    <div class="posts">
                        <ul>
                            <?php if (isset($modified)){
                                foreach ($modified as $modified){ ?>
                                    <li><?php echo $this->Html->link(__($modified['Post']['title']), array('controller' => 'posts', 'action' => 'view', 'slug' => $modified['Post']['slug']));?></a></li>
                                <?php        }}?>
                        </ul>
                    </div>
                    <h2>
                        <span class="list_user">
                            <?php echo $this->html->link(__('Latest Posts'), '#', array('onclick'=>'return false;')); ?>
                        </span>
                    </h2>
                    <div class="posts" id="latest">
                        <ul>
                            <?php if (isset($latest)){
                                foreach ($latest as $latest){ ?>
                                    <li><?php echo $this->Html->link(__($latest['Post']['title']), array('controller' => 'posts', 'action' => 'view', 'slug' => $latest['Post']['slug']));?></a></li>
                                <?php        }}?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="bottom">
        <div id="container">
            <div id="about">
                <div id="authorimage">
                    <?php echo $this->Html->image('/img/authorimg.png', array('width' => "108", 'height' => '108'));?>
                    <!--            <img src="images/authorimg.png" width="108" height="108" alt="" /> -->
                </div>
                <div id="authorbio">
                    <h2><?php echo __('About');?></h2>
                    <p><?php echo __('The modern English word blue comes from Middle English bleu or blewe, from the Old French bleu, a word of Germanic origin related to Old Dutch, Old High German,[2] Old Saxon blāo and Old Frisian blāw, blau.[3][4] The clear sky and the deep sea appear blue because of an optical effect known as Rayleigh scattering. When sunlight passes through the atmosphere, the blue wavelengths are scattered more widely by the oxygen and nitrogen molecules, and more blue comes to our eyes.');?></p>
                </div>
            </div>
            <div id="tags">
                <h2 class="title"><?php echo __('Tag Cloud');?></h2>
                <div class="content"> <a href="#" class="level6">inspiration</a> <a href="#" class="level5">daily inspiration</a> <a href="#" class="level4">photography</a> <a href="#" class="level4">tutorial</a> <a href="#" class="level4">illustration</a> <a href="#" class="level4">design</a> <a href="#" class="level3">best of the week</a> <a href="#" class="level3">iphone</a> <a href="#" class="level3">Typography</a> <a href="#" class="level3">photoshop</a> <a href="#" class="level3">wallpaper</a> <a href="#" class="level2">architecture</a> <a href="#" class="level2">web design</a> <a href="#" class="level2">interview</a> <a href="#" class="level2">video</a> <a href="#" class="level2">free</a> <a href="#" class="level2">wallpaper of the week</a> <a href="#" class="level2">sites of the week</a> <a href="#" class="level2">graphic design</a> <a href="#" class="level2">freebie</a> <a href="#" class="level2">fonts</a> <a href="#" class="level2">case study</a> <a href="#" class="level2">logo</a> <a href="#" class="level2">giveaway</a> <a href="#" class="level2">art</a> <a href="#" class="level1">hdr</a> <a href="#" class="level1">digital art</a> <a href="#" class="level1">poster</a> <a href="#" class="level1">fireworks</a> <a href="#" class="level1">posters</a> <a href="#" class="level1">illustrator</a> <a href="#" class="level1">gadgets</a> <a href="#" class="level1">photo manipulation</a> <a href="#" class="level1">ads</a> <a href="#" class="level1">logo design</a> <a href="#" class="level1">FFFF</a> <a href="#" class="level1">3d</a> <a href="#" class="level1">video of the week</a> <a href="#" class="level1">offices</a> <a href="#" class="level1">product design</a> </div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="credits">
            <div class="leftalign">Copyright &copy; 2010 YourSiteName.com</div>
            <div class="rightalign"><?php echo __('Design by');?> <a href="http://cssheaven.org">CSSHeaven.org</a></div>
        </div>
    </div>
    </body>

</html>
