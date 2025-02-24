<form id="insert" action="insertProduct" method="post">
    <table>
        <tr>
            <td><input type="text" placeholder="cod" name="insert_cod" required></td>
            <td><input type="text" placeholder="short name" name="insert_name" required></td>
            <td><textarea name="insert_description" placeholder="description" rows="5" cols="30" required></textarea></td>
            <td><input type="text" name="insert_RRP" placeholder="RRP" required></td>
            <td><input type="text" name="insert_family" placeholder="Family" required></td>
            <td><input type="submit" value="Insert" name="insert"></td>
        </tr>
    </table>
</form>