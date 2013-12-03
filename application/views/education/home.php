<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/css/normalize.min.css">
        <link rel="stylesheet" href="/css/main.css">

        <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
                <div class="form">
                    <form name="search" id="searching" action="<?php echo base_url();?>index.php/education/search" method="post">
                        <label>Search:
                        </label>
                        <input  id="search" type="text" name="search" value="" />
                        <button>Search</button>
                    </form>
                </div>
                <ul class="list_images">
                    <?php 
                    foreach ($images as $image){ ?>
                     <li>
                        <img src="<?php echo $image->url; ?>" width="<?php echo $image->width; ?>" height="<?php echo $image->height; ?>"/>
                    </li>
                    <?php } ?>
                   
                </ul>

                <div class="pagination">
                     <?php echo $this->pagination->create_links(); ?>
                </div>   

            </div> <!-- #main -->

        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="/js/main.js"></script>

    </body>
</html>
