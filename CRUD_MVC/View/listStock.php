<table>
    <tr>
        <th>Product</th>
        <th>Store</th>
        <th>Units</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php foreach ($stocks as $stock): ?>
        <tr>
            <form action="index.php" method="post">
                <td>
                    <select name="product">
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['cod'] ?>" 
                                <?= ($product['cod'] == $stock['product']) ? 'selected' : '' ?>>
                                <?= $product['short_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="store">
                        <?php foreach ($stores as $store): ?>
                            <option value="<?= $store['cod'] ?>" 
                                <?= ($store['cod'] == $stock['store']) ? 'selected' : '' ?>>
                                <?= $store['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="number" value="<?= $stock['units'] ?>" name="units">
                </td>
                <td>
                    <input type="submit" value="Update" formaction="index.php?accion=updateStock" name="update">
                </td>
                <td>
                    <input type="submit" value="Delete" formaction="index.php?accion=deleteStock" name="delete">
                </td>
                <input type="hidden" name="delete_product" value="<?= $stock['product'] ?>">
                <input type="hidden" name="delete_store" value="<?= $stock['store'] ?>">
            </form>
        </tr>
    <?php endforeach; ?>
</table>