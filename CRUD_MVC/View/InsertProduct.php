<form id="insert" action="?accion=insertProduct" method="post">
    <table>
        <tr>
            <td><input type="text" placeholder="cod" name="insert_cod" required></td>
            <td><input type="text" placeholder="short name" name="insert_name" required></td>
            <td><textarea name="insert_description" placeholder="description" rows="5" cols="30" required></textarea></td>
            <td><input type="text" name="insert_RRP" placeholder="RRP" required></td>
            <td>
                <select name="insert_family">
                    <?php
                    foreach ($families as $fam) {
                        echo "<option value='${fam['cod']}'>${fam['name']}</option>";
                    }
                    echo "</select></td>";
                    ?>
                </select>
            </td>
            <td><input type="submit" value="Insert" name="insert"></td>
        </tr>
    </table>
</form>