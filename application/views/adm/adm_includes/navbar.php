<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
					 <a class="navbar-brand title-window"></a>
					 <script>
						$('.title-window').text($('title').text());
					 </script>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <!--  <li class="dropdown"> 
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Сообщения</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>-->
						<li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img width="30" height="30" class="avatar border-white" src="/<?php echo trim($profile->avatar) ?>">
									<p><?php echo trim($profile->first_name) ?></p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo '/startpage/edit_users'?>">Настройки</a></li>
                                <li><a href="<?php echo '/auth/logout' ?>">Выйти</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>