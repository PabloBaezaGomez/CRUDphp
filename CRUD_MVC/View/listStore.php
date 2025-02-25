<?php
foreach ($stores as $store) {
    ?>
    <form action="index.php" method="post">
        <tr>
            <td><input type='text' name='cod' value='<?= $store['cod'] ?>'></td>
            <td><input type='text' name='name' value='<?= $store['name'] ?>'></td>
            <td><input type='number' name='name' value='<?= $store['tlf'] ?>'></td>

            <td><button type="submit" formaction="index.php?accion=updateStore">Update</button></td>
            <td><button type="submit" formaction='index.php?accion=deleteStore'>Delete</button></td>
            <input type=hidden name='delete_code' value='<?= $store['cod'] ?>'>

        </tr>
    </form>
    <?php
}
?>
