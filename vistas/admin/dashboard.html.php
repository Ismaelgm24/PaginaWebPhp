<h2>Dashboard</h2>

<div class="row mt-4">
    <div class="col-12 col-md-4 mb-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Información del Usuario</h4>
            </div>
            <div class="card-body">
                <div class="user-info">
                    <p><strong>Nombre:</strong> <?php echo $_SESSION['usuario']['nombre'] ?></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION['usuario']['email'] ?></p>
                    <p><strong>Última conexión:</strong> 
                        <?php 
                        if (isset($_SESSION['usuario']['ultima_conexion']) && $_SESSION['usuario']['ultima_conexion']) {
                            echo date('d/m/Y H:i', strtotime($_SESSION['usuario']['ultima_conexion']));
                        } else {
                            echo "No disponible";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <h3>Últimos Posts</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover text-center shadow-lg">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post): ?>
                    <tr>
                        <td><?php echo $post['titulo'] ?></td>
                        <td><?php echo $post['usuario'] ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($post['fecha'])) ?></td>
                        <td>
                            <a href="productos.php?editar=<?php echo $post['id'] ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>