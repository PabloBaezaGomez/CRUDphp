<form id="insert" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table>
                    <tr>
                        <td>
                            <select name="insert_product">
                                <?php
                                $sql = "SELECT cod, short_name FROM product";
                                $result = $dwes->query($sql);
                                $row = $result->fetch();
                                while ($row) {
                                    echo "<option value='${row['cod']}'>${row['short_name']}</option>";
                                    $row = $result->fetch();
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="insert_store">
                                <?php
                                $sql = "SELECT cod, name FROM store";
                                $result = $dwes->query($sql);
                                $row = $result->fetch();
                                while ($row) {
                                    echo "<option value='${row['cod']}'>${row['name']}</option>";
                                    $row = $result->fetch();
                                }
                                ?>
                            </select>
                        </td>
                        <td><input type="number" placeholder="units" name="insert_units" required></td>
                        <td><input type="submit" value="Insert" name="insert"></td>
                    </tr>
                </table>
            </form>
