<?php
foreach ($stores as $store) {
    ?>
    <form action="index.php" method="post">
        <tr>
            <td><input type='text' name='cod' value='<?= $store['cod'] ?>' required></td>
            <td><input type='text' name='name' value='<?= $store['name'] ?>' required></td>
            <td><input type='number' name='tlf' value='<?= $store['tlf'] ?>' required></td>

            <td><button type="submit" formaction="index.php?accion=updateStore">Update</button></td>
            <td><button type="submit" formaction='index.php?accion=deleteStore'>Delete</button></td>
            <input type=hidden name='delete_code' value='<?= $store['cod'] ?>'>

        </tr>
    </form>
    <?php
}
?>