<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $view['html']['title']; ?></title>
    <meta name="description" content="<?php echo $view['html']['description']; ?>">
    <meta name="author" content="qvsinh@gmail.com">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo $view['global_var']['asset_url']; ?>ico/favicon.ico">
    <link href="<?php echo $view['global_var']['css_url']; ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $view['global_var']['css_url']; ?>bootflat.min.css" rel="stylesheet">
    <?php
    foreach ($view['html_assets']['more_css'] as $cssfile) {
        if (strpos($cssfile, 'http') === 0) {
            echo '<link href="' . $cssfile . '" rel="stylesheet">' . PHP_EOL;
        } else {
            echo '<link href="' . $view['global_var']['css_url'] . $cssfile . '" rel="stylesheet">' . PHP_EOL;
        }
    }
    ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
    <body style="background-color: #f1f2f6;">
      <?php
      $this->template->include_view($view['module_view']);
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
