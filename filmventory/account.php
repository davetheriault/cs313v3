<?php require 'includes/session.php'; ?>
<?php require 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>

<?php $title = $_SESSION['username'] . ' Account'; ?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s0 m0 l1">&nbsp;</div>
        <div class="w3-col s12 m8 l6">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0"><span style="text-transform: uppercase;"><?php echo $_SESSION['username']; ?></span>&apos;s Movie Collection</h3>
                <div id="collection" class="w3-container w3-padding" >
                    <div class="w3-container">
                        <div class="w3-col s0 m1 l2">&nbsp;</div>
                    <table class="w3-table w3-col s12 m10 l8">
                        <tr>
                            <td>
                                Username:
                            </td>
                            <td>
                                <?php echo $_SESSION['username']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password:
                            </td>
                            <td>
                                *********
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="accountedit.php">Change Username/Password</a></td>
                        </tr>
                    </table>
                    <div class="w3-col s0 m1 l2">&nbsp;</div></div>
                    
                </div>
            </div>
        </div>
        <div class="w3-col s12 m4 l4">
            <?php require 'includes/management.php'; ?>
        </div>        
    </div>

</main>

<?php include 'includes/footer.php'; ?>
