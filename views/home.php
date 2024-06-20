<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>   
        </tr>

        <?php
            foreach ($users as $user) {
                echo '<tr>
                        <td>'.$user['id'].'</td>
                        <td>'.$user['name'].'</td>
                        <td>'.$user['email'].'</td>
                        <td>'.$user['password'].'</td>
                    </tr>';
            }
        ?>
    </table>
</body>
</html>