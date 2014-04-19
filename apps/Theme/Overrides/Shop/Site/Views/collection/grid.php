<?php if (!empty($paginated->items)) { ?>

    <div class="main-bottom">
        <div class="half text-left">
            <div class="page-counter pull-left">
                <div class="type-selector">
                    <span class="pagination">
                        <?php echo (!empty($paginated->total_pages)) ? $paginated->getResultsCounter() : null; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="half text-right">
            <?php if (!empty($paginated->total_pages) && $paginated->total_pages > 1) { ?>
                <?php echo $paginated->serve(); ?>
            <?php } ?>
        </div>
    </div>


    <?php foreach ($paginated->items as $position=>$item) { ?>
        <?php $item->url = './shop/product/' . $item->{'slug'}; ?>
        
        <?php if (($position+1) % 3 == 0) { ?>
        <div class="row">
        <?php } ?>
        
        <article class="category-article category-grid col-sm-4">
            <figure>
                <?php if ($item->{'featured_image.slug'}) { ?>
                <img src="./asset/thumb/<?php echo $item->{'featured_image.slug'}; ?>" alt="" />
                <?php } ?>
                <a href="<?php echo $item->url; ?>">
                <div class="figure-overlay">
                    <?php // if rating enabled and rating exists, display 
                    /*
                    <div class="rating-line">
                        <div class="stars-white" data-number="5" data-score="4"></div>
                    </div>
                    */ ?>
                    <?php if ($item->{'description'}) { ?>
                    <div class="excerpt">
                        <?php echo $item->{'description'}; ?>
                    </div>
                    <?php } ?>
                    
                    <button class="btn btn-default custom-button">
                        Quick View
                    </button>
                    
                    <?php /* ?>
                    <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                    <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                    */ ?>
                </div>
                </a>
            </figure>
            <div class="text">
                <h2><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></h2>
                <div class="price">
                    <a href="<?php echo $item->url; ?>">
                    <span class="new-price">$<?php echo $item->price(); ?></span>
                    </a>
                </div>
            </div>
        </article>
        
        <?php if (($position+1) % 3 == 0) { ?>
        </div>
        <?php } ?>
    
    <?php } // end foreach ?>
    
    <div class="main-bottom">
        <div class="half text-left">
            <div class="page-counter pull-left">
                <span class="pagination">
                    <?php echo (!empty($paginated->total_pages)) ? $paginated->getResultsCounter() : null; ?>
                </span>             
            </div>
        </div>
        <div class="half text-right">
            <?php if (!empty($paginated->total_pages) && $paginated->total_pages > 1) { ?>
                <?php echo $paginated->serve(); ?>
            <?php } ?>
        </div>
    </div>

<?php } else { ?>
    
    <div class="">No items found.</div>
    
<?php } ?>
