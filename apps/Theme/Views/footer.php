<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="footer-widget">
                    <div class="widget-title">
                        <h2>My Account</h2>
                    </div>
                    <div class="widget-content">
                    <?php 
                    if ($list = \Admin\Models\Menus::instance()->emptyState()->setState('filter.root', false)->setState('filter.published', true)->setState('filter.tree', '534759a2f02e253a3d96ce4e')->setState('order_clause', array( 'tree'=> 1, 'lft' => 1 ))->getList()) 
                    { 
                        echo (new \Modules\Modules\Menu\Module( array('list'=>$list, 'class_suffix'=>'links' ) ))->html();
                    } 
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-widget">
                    <div class="widget-title">
                        <h2>Customer Care</h2>
                    </div>
                    <div class="widget-content">
                    <?php 
                    if ($list = \Admin\Models\Menus::instance()->emptyState()->setState('filter.root', false)->setState('filter.published', true)->setState('filter.tree', '53474a27f02e25740896ce4c')->setState('order_clause', array( 'tree'=> 1, 'lft' => 1 ))->getList()) 
                    { 
                        echo (new \Modules\Modules\Menu\Module( array('list'=>$list, 'class_suffix'=>'links' ) ))->html();
                    } 
                    ?>
                    </div>
                </div>
            </div>            
            <div class="col-sm-3">
                <div class="footer-widget">
                    <div class="widget-title">
                        <h2>About Us</h2>
                    </div>
                    <div class="widget-content">
                    <?php 
                    if ($list = \Admin\Models\Menus::instance()->emptyState()->setState('filter.root', false)->setState('filter.published', true)->setState('filter.tree', '53475bf0f02e253a3d96ce50')->setState('order_clause', array( 'tree'=> 1, 'lft' => 1 ))->getList()) 
                    { 
                        echo (new \Modules\Modules\Menu\Module( array('list'=>$list, 'class_suffix'=>'links' ) ))->html();
                    } 
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-widget">
                    <div class="widget-title">
                        <h2>Contact Info</h2>
                    </div>
                    <div class="widget-content">
                        <address>
                            Amrita Singh Jewelry <br />
                            and Accessories <br />
                            580 Broadway, Suite 1109 <br />
                            New York, NY 10012 <br />
                            P: 1.855.4.AMRITA <br />
                            F: 212.840.6135
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="separator footer-separator">
                    <button class='scroll-top'>Scroll top</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="copyright">
                    <p>&copy; 2014 Solo Creations Inc. All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="social-links">
                    <ul>
                        <li><a href="#" class="facebook">facebook</a></li>
                        <li><a href="#" class="twitter">twitter</a></li>
                        <li><a href="#" class="rss">rss</a></li>
                        <li><a href="#" class="digg">digg</a></li>
                        <li><a href="#" class="linkedin">linkedin</a></li>
                        <li><a href="#" class="flickr">flickr</a></li>
                        <li><a href="#" class="skype">skype</a></li>
                        <li><a href="#" class="email">email</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>