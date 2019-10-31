<?php
    while($rows=mysqli_fetch_assoc($result)){
?>
    <tr>
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['password']; ?></td>
    </tr>
<?php
    }
?>