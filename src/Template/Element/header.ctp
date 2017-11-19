<nav class="navbar navbar-light bg-grey navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="">
            <?php echo $this->Html->image('hbf_icon_small_black.png', ['alt' => 'HBF']); ?>
            Hovedstadens Bordfodbold Forening
        </a>

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?php echo $this->Html->link('Spillere', ['controller' => 'Players', 'action' => 'index'], ['class' => 'nav-link text-secondary']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Turneringer', ['controller' => 'Tournaments', 'action' => 'index'], ['class' => 'nav-link text-secondary']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Indstillinger', ['controller' => 'Settings', 'action' => 'index'], ['class' => 'nav-link disabled text-secondary']); ?>
            </li>
        </ul>        
        
    </div>
</nav>

