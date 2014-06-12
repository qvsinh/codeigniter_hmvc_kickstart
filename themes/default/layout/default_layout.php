<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php echo $view['html']['title']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $view['html']['description']; ?>">
        <meta name="author" content="qvsinh@gmail.com">
        <link rel="shortcut icon" href="<?php echo $view['global_var']['img_url']; ?>favicon.ico"/>
        <link rel="icon" type="image/gif" href="<?php echo $view['global_var']['img_url']; ?>favicon.gif">
        <link href="<?php echo $view['global_var']['css_url']; ?>twitter-bootstrap/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['css_url']; ?>social-jquery-ui-1.10.0.custom.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['css_url']; ?>social.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['css_url']; ?>social.plugins.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['css_url']; ?>font-awesome.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['css_url']; ?>social-coloredicons-buttons.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <link rel="stylesheet" type="text/css" href="<?php echo $view['global_var']['css_url']; ?>social-jquery.ui.1.10.0.ie.css"/>
            <![endif]-->
        <link href="<?php echo $view['global_var']['css_url']; ?>demo.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['js_url']; ?>plugins/jquery.uipro/style.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['js_url']; ?>plugins/jquery.simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet">
        <link href="<?php echo $view['global_var']['css_url']; ?>themes/social.theme-blue.css" rel="stylesheet" id="theme">
        <link href="<?php echo $view['global_var']['css_url']; ?>twitter-bootstrap/bootstrap-responsive.css" rel="stylesheet">
        
        <?php
        foreach ($view['html_assets']['more_css'] as $cssfile) {
            if (strpos($cssfile, 'http') === 0) {
                echo '<link href="' . $cssfile . '" rel="stylesheet">' . PHP_EOL;
            } else {
                echo '<link href="' . $view['global_var']['css_url'] . $cssfile . '" rel="stylesheet">' . PHP_EOL;
            }
        }
        ?>
        <style>.wraper #main{margin-top:40px;}</style>
        <script type="text/javascript">
            var global_var = <?php echo $view['js_global_var']; ?>;
        </script>
    </head>
    <body>
        <div class="wraper sidebar-full">
            <?php
            $this->template->include_layout("default_left_bar");
            $this->template->include_layout("default_header");
            ?>
            <div id="main">
                <?php
                $this->template->include_view($view['module_view']);
                ?>
                <footer id="footer">
                    <div class="container-fluid">
                        2013 © <em>Social - Premium Responsive Admin Template</em> by <a href="../../../../index.html" target="_blank">cesarlab.com</a>.
                    </div>
                </footer>
            </div>
        </div>
        <?php
        $this->template->include_layout("default_right_bar");
        ?>
        
        <script src="<?php echo $view['global_var']['js_url']; ?>plugins/jquery/jquery-1.10.1.min.js"></script>
        <script src="<?php echo $view['global_var']['js_url']; ?>plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <?php
        foreach ($view['html_assets']['more_js'] as $jsfile) {
            if (strpos($jsfile, 'http') === 0) {
                echo '<script src="' . $jsfile . '"></script>' . PHP_EOL;
            } else {
                echo '<script src="' . $view['global_var']['js_url'] . $jsfile . '"></script>' . PHP_EOL;
            }
        }
        ?>        
    </body>
</html>
