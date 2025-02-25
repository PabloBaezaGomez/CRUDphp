<table>
                <?php
                $sql = "SELECT product, store, units FROM stock";
                $result = $dwes->query($sql);
                $row = $result->fetch();
                $sql = "SELECT cod, short_name FROM product";
                $result_product = $dwes->query($sql);
                $sql = "SELECT cod, name FROM store";
                $result_store = $dwes->query($sql);
                $data_store = $result_store->fetchAll(PDO::FETCH_ASSOC);
                $data_product = $result_product->fetchAll(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo "<form action=" . $_SERVER['PHP_SELF'] . " method='post'>";
                    echo "<td><select name='product'>";
                    foreach ($data_product as $dat_p) {
                        if ($dat_p['cod'] == $row['product']) {
                            echo "<option value='${dat_p['cod']}' selected>${dat_p['short_name']}</option>";
                        } else {
                            echo "<option value='${dat_p['cod']}'>${dat_p['short_name']}</option>";
                        }
                    }
                    echo "</select></td>";
                    echo "<td><select name='store'>";
                    foreach ($data_store as $dat_s) {
                        if ($dat_s['cod'] == $row['store']) {
                            echo "<option value='${dat_s['cod']}' selected>${dat_s['name']}</option>";
                        } else {
                            echo "<option value='${dat_s['cod']}'>${dat_s['name']}</option>";
                        }
                    }
                    echo "</select></td>";
                    echo "<td><input type='number' value='${row['units']}' name='units'</td>";
                    echo '<td><input type="submit" value="Update" name="update"</td>';
                    echo '<td><input type="submit" value="Delete" name="delete"</td>';
                    echo "<input type=hidden name='delete_product' value='${row['product']}'>";
                    echo "<input type=hidden name='delete_store' value='${row['store']}'>";
                    echo '</form>';
                    echo '</tr>';
                    $row = $result->fetch();
                }
                ?>
            </table>
