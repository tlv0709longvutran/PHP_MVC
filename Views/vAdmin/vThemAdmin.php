<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <form action="?module=<?=$module?>&act=xulythem" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="name" placeholder="Full Name of Admin">
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                    <input type="text" name="email" placeholder="Email of Admin">
                    </td>
                </tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Password" id="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>