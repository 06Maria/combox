<?php
    require('../config/database.php');
    $sql="SELECT firstname, lastname,mobile_phone,email,id, case when status = true then 'Active' else 'Inactive' end as user_status,photo_url
         FROM users order by lastname asc";
    $res = pg_query($supabase_conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combox - List Users</title>
</head>
<body bgcolor="#DAC8E9">
    <select >
        <option value="">All Users</option>
        <option value="">Active Users</option>
        <option value="">Inactive Users</option>
    </select>
    <center><h3>List of Users</h3></center>
    <table border="1" align="center" class="table table-striped" >
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mobile Phone</th>
            <th>Email</th>
            <th>Status</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php
            while($row = pg_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>".$row['firstname']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "<td>".$row['mobile_phone']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['user_status']."</td>";
                echo "<td align='center'><img src='".$row['photo_url']."'width='30'></td>";
                echo "<td>
                <a href='EditUser.php?id=".$row['id']."'><img src = 'icons /lapiz.png' width = '20' height = '20'></a>&nbsp;&nbsp;
                <a href='ViewUser.php?id=".$row['id']."'><img src = 'icons /lupa.png' width = '20' height = '20'></a>&nbsp;&nbsp;
                <a href='DeleteUser.php?id=".$row['id']."&action=Delete'onclick=\"return confirm('Are you sure you want to delete this user?')\"><img src = 'icons /trash.png' width = '20' height = '20'></a>&nbsp;&nbsp;
                <a href='DeleteUser.php?id=".$row['id']."&action=Deactivate'onclick=\"return confirm('Are you sure you want to deactivate this user?')\"><img src = 'icons /Inactivo.png' width = '20' height = '20'></a>&nbsp;&nbsp;
                </td>"; 
                echo "</tr>";
            }
        ?>
    
</body>
</html>    