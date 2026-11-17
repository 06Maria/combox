<?php
    require('../config/database.php');
    $id = $_GET['id'];
    $Action = $_GET['action'];

    if ($Action == "Delete") {
        $sql_d = "DELETE FROM users WHERE id = $id";
        $res = pg_query($supabase_conn, $sql_d);

        if ($res) {
            echo "<script>alert('User deleted successfully')</script>";
            header("refresh:0;url=ListUsers.php");
        } else {
            echo "<script>alert('Error deleting user')</script>";
            header("refresh:0;url=ListUsers.php");
        }
    } elseif ($Action == "Deactivate") {
        $sql_U = "UPDATE users SET status = false WHERE id = $id";
        $res_U = pg_query($supabase_conn, $sql_U);

        if ($res_U) {
            echo "<script>alert('User status updated successfully')</script>";
            header("refresh:0;url=ListUsers.php");
        } else {
            echo "<script>alert('Error updating user status')</script>";
            header("refresh:0;url=ListUsers.php");
        }
    } else {
        echo "<script>alert('Invalid action')</script>";
        header("refresh:0;url=ListUsers.php");
    }
