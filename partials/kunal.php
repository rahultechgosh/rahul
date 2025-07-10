$_SESSION['success'] = "<strong>Success!</strong> Your question has been posted.";
header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id);
exit();

if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'. $_SESSION['success'] .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['success']); // Ek baar dikhane ke baad hata do
}


echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your question has been posted.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';