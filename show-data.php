<?php  include('inc/header.php');  ?> 


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4 border my-5 "> Data</h1>
                <div>
                    <?php if(isset($_SESSION['user_name'])): ?>
                    <h2> Name : <?php echo $_SESSION['user_name'];?></h2>
                    <h2> Email : <?php echo $_SESSION['user_email'];?></h2>
                    <h2> Mobile : <?php echo $_SESSION['user_mobile'];?></h2>
                    <?php else:?>
                        <div class="alert alert-danger text-center">Data Not Found</div>


                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 