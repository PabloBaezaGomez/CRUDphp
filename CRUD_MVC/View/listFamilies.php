<?php
foreach ($families as $family) {
    ?>
    <form action="index.php" method="post">
        <tr>
            <td><input type='text' name='cod' value='<?= $family['cod'] ?>'></td>
            <td><input type='text' name='name' value='<?= $family['name'] ?>'></td>

            <td><button type="submit" formaction="index.php?accion=updateFamily">Update</button></td>
            <td><button type="submit" formaction='index.php?accion=deleteFamily'>Delete</button></td>
            <input type=hidden name='delete_code' value='<?= $family['cod'] ?>'>

        </tr>
    </form>
    <?php
}
?>