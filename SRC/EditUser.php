<?php
    require('../config/database.php');
    $id = $_GET['id'];   // el número que llegó en la URL
    $sql = 'SELECT * FROM users WHERE id = $1';
    $result = pg_query_params($supabase_conn, $sql, array($id));
    $user = pg_fetch_assoc($result);   // una sola fila: el usuario a editar
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
</head>
<body bgcolor="#DAC8E9">
    <center><h3>Editar Usuario</h3></center>
    <form action="UpdateUser.php" method="post" enctype="multipart/form-data">
    <center>
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label>Nombre</label><br>
        <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>" required><br><br>

        <label>Apellido</label><br>
        <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>" required><br><br>

        <label>Correo</label><br>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>

        <label>Celular</label><br>
        <input type="text" name="mobile_phone" value="<?php echo $user['mobile_phone']; ?>" required><br><br>

        <?php if ($user['photo_url'] != "") { ?>
            <p>Foto actual:</p>
            <img src="<?php echo $user['photo_url']; ?>" width="120"><br><br>
        <?php } ?>

        <label>Foto (JPG o PNG)</label><br>
        <input type="file" name="photo" accept=".jpg,.jpeg,.png"><br><br>

        <button type="submit">Guardar</button>
        <a href="ListUsers.php">Cancelar</a>
    </center>
    </form>
</body>
</html>