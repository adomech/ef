<?php 
        foreach ($images as $image){ ?>
        <li>
          <img src="<?php echo $image->url; ?>" width="<?php echo $image->width; ?>" height="<?php echo $image->height; ?>"/>
        </li>
<?php } ?>