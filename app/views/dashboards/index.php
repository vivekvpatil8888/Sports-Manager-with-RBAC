    <?php require APPROOT . '/views/inc/header.php'; ?>
      <?php flash('post_message'); ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
        <a class="navbar-brand" href=""></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        <?php 
        //only visible to admin
        if($_SESSION['user_role'] == 1){?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/currentusers/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/sports/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Sports</span>
          </a>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/seasons/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Seasons</span>
          </a>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/slscombos/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">SIS Combo</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/teams/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Teams</span>
          </a>
        </li>   
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/positions/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Positions</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/players/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Players</span>
          </a>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Scheadule</span>
          </a>
        </li>       
        
        <?php }?>
        
        <?php 
        //only visible to Team Manager or Coach
        if(($_SESSION['user_role'] == 4) || $_SESSION['user_role'] == 3 ){?>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/currentusers/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li> 
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/teams/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Teams</span>
          </a>
        </li>   
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/positions/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Positions</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/players/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Players</span>
          </a>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Scheadule</span>
          </a>
        </li> 
          
      
        <?php } ?>
        <?php 
        //only visible to League Manager
        if($_SESSION['user_role'] == 2){?>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/currentusers/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/seasons/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Seasons</span>
          </a>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/slscombos/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">SIS Combo</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/teams/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Teams</span>
          </a>
        </li>   
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/positions/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Positions</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/players/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Players</span>
          </a>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Scheadule</span>
          </a>
        </li>    
        <?php
        }
        ?>
         <?php 
        //only visible to Parent
        if($_SESSION['user_role'] == 5){?>
 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo URLROOT; ?>/teams/show">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Teams</span>
          </a>
        </li>   

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa fa-gear"></i>
            <span class="nav-link-text">Scheadule</span>
          </a>
        </li>    
        <?php
        }
        ?>
          
      </nav>

    <?php require APPROOT . '/views/inc/footer.php'; ?>