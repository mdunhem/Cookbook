<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <?php
        echo $this->Html->charset();
        echo $this->Html->meta('description', '');
        echo $this->Html->meta(array('name' => 'viewport', 'content' => 'initial-scale=1.0'));
        echo $this->fetch('meta');

        echo $this->Html->tag('title', $title_for_layout);

        echo $this->Html->css('site.min');
        echo $this->fetch('css');
            
        // Modernizer script
        echo $this->Html->script('vendor/modernizr-2.6.2.min');
    ?>
    </head>
    <body>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
        <?php
            echo $this->element('nav');

            echo $this->fetch('content');
            
            echo $this->element('footer');

            echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
            echo $this->fetch('beforeSiteJsScript');
            echo $this->Html->script('site.min');
            echo $this->fetch('script');
        ?>
    </body>
</html>