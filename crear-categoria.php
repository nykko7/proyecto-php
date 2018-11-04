<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear Categorias</h1>
    <p>
        Añade nuevas Categorias al blog para luego crear entradas.
    </p>
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre Categoria</label>
        <input type="text" name="nombre" />
        
        <input type="submit" value="Guardar" />
    </form>
    
</div> <!-- Fin PRINCIPAL  -->         
    <?php require_once 'includes/pie.php'; ?>       
    </body>
</html>
 
<?php require_once 'includes/pie.php'; ?>

