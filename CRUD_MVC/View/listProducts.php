<?php
foreach ($products as $product) {
    ?><form action="index.php" method='post'>
        <tr>
            <td><input type='text' name='cod' value='<?= $product['cod'] ?>'></td>
            <td><input type='text' name='short_name' value='<?= $product['short_name'] ?>'</td>
            <td><textarea name='description' rows='5' cols='30'><?= $product['description'] ?></textarea></td>
            <td><input type='text' name='rrp' value='<?= $product['RRP'] ?>'></td>
            <td><select name='family'>
                    <?php
                    foreach ($families as $fam) {
                        if ($fam['cod'] == $product['family']) {
                            ?>
                    <option value="<?= $fam['cod'] ?>" selected><?= $fam['name'] ?></option>
                        <?php } else {
                            ?>
                            <option value="<?= $fam['cod'] ?>"><?= $fam['name'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select></td>
            <td><button type="submit" formaction="index.php?accion=updateProduct">Update</button></td>
            <td><button type="submit" formaction= 'index.php?accion=deleteProduct'>Delete</button></td>
        <input type=hidden name='delete_code' value='<?= $product['cod'] ?>'>
        </tr>
    </form>
    <?php
}
?>
