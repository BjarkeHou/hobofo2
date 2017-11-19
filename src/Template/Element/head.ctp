<?php
    echo $this->Html->charset();
    echo $this->Html->script('jquery-3.2.1.min.js');
    // echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    echo $this->Html->css('bootstrap');
    echo $this->Html->script('bootstrap.bundle');


    
    echo $this->Html->css('base');
    echo $this->Html->css('myStyle');

    echo $this->Html->meta('icon');

    // echo $this->Html->css('cake');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');




?>
<title>Hobofo2</title>