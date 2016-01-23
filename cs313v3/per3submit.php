<?php session_start(); ?>

<?php $_SESSION['voted'] = 'voted'; ?>

<?php echo $_SESSION['voted']; ?>

<?php include 'index.php'; ?>
