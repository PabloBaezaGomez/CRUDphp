<form  id="insert" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table>
                    <tr>
                        <td><input type="text" placeholder="cod" name="insert_cod" required></td>
                        <td><input type="text" placeholder="short name" name="insert_name" required></td>
                        <td><input type="text" placeholder="Phone Number" name="insert_number" required></td>
                        <td><input type="submit" value="Insert" name="insert"></td>
                    </tr>
                </table>
            </form>
