<table>
                <?php
                $sql = "SELECT cod, name, tlf FROM store";
                $result = $dwes->query($sql);
                $row = $result->fetch();
                while ($row) {
                    echo "<form action=" . $_SERVER['PHP_SELF'] . " method='post'>";
                    echo '<tr>';
                    echo "<td><input type='text' name='cod' value=' ${row['cod']}'></td>";
                    echo "<td><input type='text' name='name' value=' ${row['name']}'</td>";
                    echo "<td><input type='text' name='number' value=' ${row['tlf']}'</td>";
                    echo '<td><input type="submit" value="Update" name="update"</td>';
                    echo '<td><input type="submit" value="Delete" name="delete"</td>';
                    echo "<input type=hidden name='delete_code' value='${row['cod']}'>";
                    echo '</tr>';
                    echo '</form>';
                    $row = $result->fetch();
                }
                ?>

            </table>
