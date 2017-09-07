<aside class="sidebar">
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <form class="navbar-form navbar-left" id="searchNavBar">
      <div class="form-group">
        <h4 class="widget-title sidebar-widget-title">Recherchez une association</h4>
        <input type="text" id="recherche" class="form-control" placeholder="Association..." autocomplete="off">
        <button class="btn btn-info btn-lg form-control" type="button">
									<i class="glyphicon glyphicon-search"></i>
								</button>
        <?php

          include '../Le site/Views/searchview.php';

         ?>
      </div>
    </form>
  </div>
    <?php dynamic_sidebar('sidebar-widget-area'); ?>
</aside>
