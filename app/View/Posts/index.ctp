
<!-- START PAGE SOURCE -->
    <div id="content">
        <div class="notification">
            <h2><?php echo $this->Session->flash('noResult');?></h2>
            <h2><?php echo $this->Session->flash('loginError');?></h2>
            <h2><?php echo $this->Session->flash('deletePostSuccess');?></h2>
            <h2><?php echo $this->Session->flash('login');?></h2>
            <h2><?php echo $this->Session->flash('addPostSuccess');?></h2>
            <h2><?php echo $this->Session->flash('editPostError');?></h2>
            <h2><?php echo $this->Session->flash('deletePostError');?></h2>
        </div>
      <div id="left">
        <div class="post">
            <?php
            if (isset($posts)){
                foreach ($posts as $post){?>
                  <div class="postleft">
                        <div class="postdate">
                            <span class="day">
                                <?php echo date('d', strtotime($post['Post']['created']));?>
                            </span>
                            <span class="month">
                                <?php echo __(date('M'), strtotime($post['Post']['created']));?>
                            </span>
                        </div>
                        <div class="comments">
                             <p>
                                  <?php echo $this->Html->image('/img/view.png', array('alt' => 'view', 'width' => '25', 'height' => '25'));?>
                                  <a href="#" class="view">
                                      <?php echo $post['Post']['viewCount'];?>
                                  </a>
                             </p>
                        </div>
                  </div>
                  <div class="postcontent">
                      <div class="postheader">
                      <h2>
                          <?php
                          echo $this->Html->link(h($post['Post']['title']), array(
                              'controller' => 'posts',
                              'action' => 'view',
                              'slug' => $post['Post']['slug']
                          ));
                          ?>
                      </h2>
                      <span class="postmeta">
                          <?php
                            echo __('By ') ,$post['User']['username'];
                          ?>
                      </span>
                      </div>
                      <p><?php echo h($post['Post']['body']); ?>
                          <span class="readmore">
                                <?php
                                    echo $this->Html->link(__('read more'), array(
                                        'controller' => 'posts',
                                        'action' => 'view',
                                        'slug' => $post['Post']['slug']
                                    ));
                                ?>
                          </span>
                    </p>
                  </div>
            <?php }} ?>
        </div>
        <div class="pagination clear">
          <div class="pre">
              <?php echo $this->Paginator->prev(__(''), array(), null, array('class' => 'prev disabled')); ?>
          </div>
          <div class="next">
              <?php echo $this->Paginator->next(__(''), array(), null, array('class' => 'next disabled')); ?>
          </div>
        </div>
      </div>


<!-- END PAGE SOURCE -->
