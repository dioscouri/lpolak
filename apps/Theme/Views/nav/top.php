<div class="navbar navbar-inverse navbar-fixed-top navbar-custom">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">
                <img src="./site/images/logo.png" />
            </a>
        </div>

        <div id="nav-primary-items" class="navbar-collapse collapse megamenu">
            <?php
            if ($list = \Admin\Models\Menus::instance()->emptyState()
                ->setState('filter.root', false)
                ->setState('filter.published', true)
                ->setState('filter.tree', '52b9bfdbf02e257c2eb5ecac')
                ->setState('order_clause', array(
                'tree' => 1,
                'lft' => 1
            ))
                ->getList())
            {
                echo (new \Modules\Modules\Megamenu\Module(array(
                    'list' => $list,
                    'class_suffix' => 'nav navbar-nav'
                )))->html();
            }
            ?>

            <div class="nav-search">
                <form class="site-search" method="GET" action="/search" protect_from_csrf="true" accept-charset="UTF-8">
                    <div class="wrapper">
                        <label for="site-search"><i class="sprite-search">Search Results</i></label>
                        <input id="site-search" name="q" required="" type="text">
                    </div>
                </form>
            </div>
            
            <?php if (!empty($this->auth->getIdentity()->id)) { ?>
        
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown mega-menu mega-menu-1">
                    <a href="./shop/account" data-target="#dm-my-account" class="dropdown-toggle disabled nav-title-normal " data-toggle="dropdown" data-hover="dropdown">
                        My Account<b class="caret"></b>
                    </a>
                    <ul id="dm-my-account" class="dropdown-menu">
                        <li class="one-column">
                            <a href="./shop/wishlist">My Wishlist</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./logout">Logout</a>
                </li>
            </ul>
            
            <?php } else { ?>
            
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="./sign-in">Sign In</a>
                </li>
                <li>
                    <a href="./register">Register</a>
                </li>
            </ul>
                         
            <?php }?>
        </div>
        <!--/.navbar-collapse -->

    </div>
</div>