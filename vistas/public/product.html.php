  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Posts</h3>
          <span class="breadcrumb"><a href="index.php">Home</a> > Posts</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      
    <div class="container">
        <!-- Campo de buscar -->
        <div class="row mb-4">
            <div class="col-md-6">
                <form action="product.php" method="get" class="d-flex">
                    <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar posts..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : '' ?>">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>

        <div class="row">
				<?php foreach($post as $posts): ?>
                <div class="col-lg-4 mb-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                            </div>
                            <img class="img-fluid w-100" style="height: 250px; object-fit: cover;" src="../admin/imagenes/productos/<?php echo  $posts['id'] ?>.jpg" alt="">
                        </div>
                        <div class="post-info mt-3 px-3">
                            <h4 class="post-title mb-3 text-center" style="font-size: 1.5rem; font-weight: bold;"><?php echo $posts['titulo'] ?></h4>
                            <div class="row align-items-center mb-3">
                                <div class="col-6 text-start">
                                    <span class="post-author" style="color: #007bff; font-weight: 500;">
                                        <i class="fa fa-user"></i> <?php echo $posts['usuario_id'] ?>
                                    </span>
                                </div>
                                <div class="col-6 text-end">
                                    <span class="post-date" style="color: #666; font-style: italic;">
                                        <i class="fa fa-clock"></i> <?php echo date('d/m/Y H:i', strtotime($posts['fecha'])) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="post-content mt-2 text-center">
                                <p style="color: #333; line-height: 1.6;"><?php echo substr($posts['contenido'], 0, 150) . '...' ?></p>
                            </div>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
                <div class="col-lg-12">
                    <?php include "paginacion.html.php" ?>
                </div>
            </div>
        </div>
      </div>
    </div>
