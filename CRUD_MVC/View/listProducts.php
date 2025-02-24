<?php

foreach ($products as $product) {
    echo "<form action=" . $_SERVER['PHP_SELF'] . " method='post'>";
    echo '<tr>';
    echo "<td><input type='text' name='cod' value=' ${product['cod']}'></td>";
    echo "<td><input type='text' name='short_name' value=' ${product['short_name']}'</td>";
    echo "<td><textarea name='description' name products='5' cols='30'>${product['description']}</textarea></td>";
    echo "<td><input type='text' name='rrp' value=' ${product['RRP']}'></td>";
    echo "<td><select name='family'>";
    foreach ($data as $dat) {
        if ($dat['cod'] == $product['family']) {
            echo "<option value='${dat['cod']}' selected>${dat['name']}</option>";
        } else {
            echo "<option value='${dat['cod']}'>${dat['name']}</option>";
        }
    }
    echo "</select></td>";
    echo '<td><input type="submit" value="Update" name="update"</td>';
    echo '<td><input type="submit" value="Delete" name="delete"</td>';
    echo "<input type=hidden name='delete_code' value='${product['cod']}'>";
    echo '</tr>';
    echo '</form>';
}
?>