<?php
// make sure the user is logged in as a valid administrator
// if not, redirect back to the index for /admins
if(!isset($_SESSION['is_valid_admin'])) {
    header("Location: ." );
}
?>