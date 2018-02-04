 <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                <a class="nav-link nav-menu-main menu-toggle hidden-xs">
                    <i class="icon-menu5 font-large-1"></i>
                </a>
            </li>
			  <div class="clearfix"></div>
            <li class="nav-item" style="width: 100%;">
				<div class="main-menu-header">
                	<input type="text" placeholder="Search" class="menu-search form-control round"/>
				</div>
            </li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down">
                  <a class="nav-link nav-menu-main menu-toggle hidden-xs">
                      <i class="fas fa-align-justify"></i>
                  </a>
              </li>
              <li class="nav-item hidden-sm-down">
                  <a href="#" class="nav-link nav-link-expand"><i class="fas fa-expand"></i></a>
              </li>
              <li class="nav-item hidden-sm-down">
                  <a class="nav-link"><i>Form Creator</i></a>
              </li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">

				<li class="dropdown dropdown-notification nav-item">
					<a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
						<i class="fa fa-sign-out-alt"></i> Logout 
					</a>

              </li>
			</ul>
          </div>
        </div>
      </div>
    </nav>

	<div id="error_language_session"></div>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
		<!--
        <div class="main-menu-header">
            <input type="text" placeholder="Search" class="menu-search form-control round"/>
        </div>
		-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
		  <li class="navigation-header">
				<span data-i18n="nav.category.support">General</span>
				<i data-toggle="tooltip" data-placement="right" data-original-title="General" class="icon-ellipsis icon-ellipsis"></i>
          </li>
          <li class="nav-item {if $filename eq 'homepage'} {$activeClass} {/if}">
              <a href="index.php">
                  <i class="fab fa-wpforms"></i>
                  <span data-i18n="nav.dash.main" class="menu-title">Forms</span>
              </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- / main menu-->