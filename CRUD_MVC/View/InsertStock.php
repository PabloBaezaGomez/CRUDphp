<form id="insert" action="?accion=insertStock" method="post">
    <table>
        <tr>
            <td>
                <select name="insert_product" required>
                    <option value="">Select Product</option>
                    <?php
                    foreach ($products as $product) {
                        echo "<option value='${product['cod']}'>${product['short_name']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="insert_store" required>
                    <option value="">Select Store</option>
                    <?php
                    foreach ($stores as $store) {
                        echo "<option value='${store['cod']}'>${store['name']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td>
                <input type="number" placeholder="Units" name="insert_units" required>
            </td>
            <td>
                <input type="submit" value="Insert" name="insert">
            </td>
        </tr>
    </table>
</form>
