<div class="col-lg-3 my-4 w-100 border-right">
    <div class="container-fluid">
        <div class="row">
            <!-- user image  -->
            <div class="col-3">
                <a href="http://localhost/Make%20It%20Work/profile.php" class="nav-link p-0 m-0 ">
                    <img src="uploads/<?= $_SESSION['user_Image'];?>"
                        class="img-fluid rounded border rounded-circle w-100 h-100 border-dark"
                        alt="User Profile Picture">
                </a>
            </div>
            <!-- user name  -->
            <div class="col-9 p-1">
                <a href="http://localhost/Make%20It%20Work/profile.php" class="nav-link w-75 d-flex justify-content-center p-0 m-0">
                    <h5 class="text-dark p-0 m-0 w-100 text-light"><?= $_SESSION['user_Name'];?></h5>
                </a>
            </div>
        </div>
    </div>

    <div class="my-4">
        <div class="container-fluid">
            <div class="row">
                <!-- location  -->
                <div class="col-3 w-25 h-25">
                    <a href="#" class="nav-link m-0 p-0" data-toggle="collapse"
                        data-target="#collapseExample1" aria-expanded="false"
                        aria-controls="collapseExample">
                        <h5 class="text-dark">Location</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mx-2 w-25">
                    <div class="collapse" id="collapseExample1">
                        <p class="text-dark" style="user-select: none;">
                        <b>
                        <?= $_SESSION['user_Location'];?>
                        </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- skills  -->
                <div class="col-3 w-25 my-2 h-25">
                    <a href="#" class="nav-link m-0 p-0" data-toggle="collapse"
                        data-target="#collapseExample2" aria-expanded="false"
                        aria-controls="collapseExample">
                        <h5 class="text-dark">Skills</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-9 mx-2 w-100">
                    <div class="collapse" id="collapseExample2">
                        <p class="text-dark" style="user-select: none;">
                            <b><?= $_SESSION['user_Experience'];?> </b>
                            year(s) of experience in 
                            <b>
                            <?= $_SESSION['user_Professionality'];?>
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- hobbies  -->
                <div class="col-3 w-25 my-2 h-25">
                    <a href="#" class="nav-link m-0 p-0" data-toggle="collapse"
                        data-target="#collapseExample3" aria-expanded="false"
                        aria-controls="collapseExample">
                        <h5 class="text-dark">Interests</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-9 mx-2 w-100">
                    <div class="collapse" id="collapseExample3">
                        <p class="text-dark" style="user-select: none;">
                        <b>
                        <?= $_SESSION['user_Interests'];?>
                        </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>