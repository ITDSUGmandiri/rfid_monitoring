      <div class="navigation-dashboard-bottom">
          <div class="row-fluid">
              <a data-href="<?= admin_base_url('/dashboard/remove/' . $slug) ?>" class="btn btn-default btn-flat remove-dashboard">Delete Dashboard</a>
              <a href="<?= admin_base_url('/dashboard/show/' . $slug) ?>" class="btn btn-default btn-flat">View Dashboard</a>
          </div>
      </div>
      <div class="cc-engine">
          <div class="sidebar-lamlam">

              <div class="logo-wrapper">
                  <span class="beta">
                      BETA
                  </span>
              </div>
              <section class="menu-left">
                  <a class="menu-add-page" href="<?= admin_site_url('/dashboard') ?>">
                      <i class="fa fa-dashboard">
                      </i>
                      <br>
                      <?= cclang('dashboard'); ?>
                      </br>
                  </a>
                  <a href="#" class="btn-add-widged">
                      <i class="fa fa-puzzle-piece">
                      </i>
                      <br>
                      <?= cclang('widged'); ?>
                      </br>
                  </a>
                  <a href="<?= admin_site_url('/widged/manage') ?>">
                      <i class="fa fa-cog">
                      </i>
                      <br>
                      <?= cclang('config'); ?>
                      </br>
                  </a>
                  <!-- 
            <a href="#">
                <i class="fa fa-opencart">
                </i>
                <br>
                    <?= cclang('store'); ?>
                    <span class="soon">
                        <?= cclang('soon'); ?>
                    </span>
                </br>
            </a> -->
              </section>
          </div>
          <!--   <div class="sidebar-component sidebar-page cc-sidebar-wrapper">
      <div class="header-page">
          <div class="cc-page-title">
              Pages
              <a class="pull-right btn-close-page btn-close-side-page" href="#">
                  ✕
              </a>
          </div>
      </div>
      <div class="cc-page-menu">
          <div class="cc-page-information text-muted">
              <i class="fa fa-info-circle">
              </i>
              Click the menu to select a page
          </div>
          <div class="cc-wrapper-btn-page">
              <ul class="cc-page-list-menu">
                  <div class="cc-page-list-menu-wrapper-item">
                     <li>
                    <a href="#" class="cc-menu-page cc-menu-page-item" >Page1</a>
                    <a class="cc-setting cc-btn-setting" href="#"  data-id="s"><i class="fa fa-cog"></i></a>
                  </li>
                  </div>
                  
                  <li class="cc-box-add-page">
                      <a class="cc-menu-page" href="#">
                          Add Page
                      </a>
                      <a class="cc-add-page" href="">
                          <i class="fa fa-plus-circle">
                          </i>
                      </a>
                  </li>
                  <li class="cc-box-add-page-fill display-none">
                      <div class="cc-menu-page cc-page-new-page-wrapper ">
                          <input class="cc-page-name" id="pageName" name="page_name" placeholder="Ketik nama halaman.." type="text"/>
                      </div>
                      <a class="cc-add-ok" href="">
                          <i class="fa fa-check-circle-o">
                          </i>
                      </a>
                  </li>
              </ul>
          </div>
          <ul class="cc-add-new-page-wrapper">
          </ul>
      </div>
  </div>
   -->
          <!-- 
    <div class="sidebar-component sidebar-widged-setting cc-sidebar-wrapper" 
      data-width="500px"
      data-class=".sidebar-widged-setting"
    >
        <div class="header-page">
            <div class="cc-page-title">
                Widged Setting
                <a class="pull-right btn-close-page btn-close-side-page" href="#">
                    ✕
                </a>
            </div>
        </div>
        <div class="cc-page-menu">
            <div class="cc-page-information text-muted">
                
            </div>

            <div class="widged-setting-wrapper">
              
            </div>
        </div>
    </div> -->


          <div class="sidebar-component sidebar-widged cc-sidebar-wrapper" data-width="400px" data-class=".sidebar-widged">
              <div class="header-page">
                  <div class="cc-page-title">
                      Add Widged
                      <a class="pull-right btn-close-page btn-close-side-page" href="#">
                          ✕
                      </a>
                  </div>
              </div>
              <div class="cc-page-menu">
                  <div class="cc-page-information text-muted">
                      <i class="fa fa-info-circle">
                      </i>
                      Click widged type
                  </div>
                  <div class="cc-overlay-page-setting">
                      <img class="cc-img-loader" src="<?= BASE_ASSET; ?>img/rolling-loader.svg">
                      </img>
                  </div>


                  <div class="col-md-12">
                      <?php foreach ($this->cc_widged->_load_widgeds() as $widged) : 
                        $installed = $this->db->table_exists($widged->instance->table_name);
                        ?>
                          <div class="widged-option <?= $installed ? '' : 'not-installed' ?>" data-type="<?= $widged->get('name') ?>">
                              <div class="widged-icon">
                                  <?= $widged->get('icon') ?>
                              </div>
                              <div class="widged-title"><?= $widged->get('name') ?></div>
                               
                          </div>
                      <?php endforeach ?>

                  </div>

              </div>
              <div>


              </div>
          </div>


      </div>