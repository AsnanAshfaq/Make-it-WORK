<div class="bg-light">
    <div class="container-fluid p-2 ">
        <h6 class="text-left border-bottom" style="user-select: none;">Create Post</h6>
    </div>
    <div class="container-fluid border-bottom p-1">
        <div class="row">
            <!-- user image  -->
            <div class="col-2">
                <a href="http://localhost/Make%20It%20Work/profile.php">
                    <img src="uploads/<?= $user_Image;?>"
                        class="img-fluid rounded border rounded-circle w-100 h-100 border-dark"
                        alt="User Profile Picture">
                </a>
            </div>
            <!-- posting area  -->
            <div class="col-10">
                <input type="text" name="post-text" class="form-control post-text h-100"
                    placeholder="Write the description of your Project here...">
            </div>
        </div>
        <div class="container-fluid my-4">
            <div class="row">
                <!-- upload file -->
                <div class="col-3">
                    <button class="btn btn-dark shadow-none" type="button" data-toggle="collapse"
                        data-target="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        Upload Image
                    </button>
                </div>
                <div class="col-4">
                    <div class="form-group position-relative">
                        <select class="form-control bg-dark text-light" name="post-category">
                            <option>Choose Category</option>
                            <option>Graphic Designing</option>
                            <option>Web Designing</option>
                            <option>Web Development</option>
                            <option>Mobile App Development</option>
                            <option>Game Development</option>
                            <option>Data Scientist</option>
                        </select>
                    </div>
                </div>
                <div class="col-5 d-flex justify-content-end w-100">
                    <button class="btn btn-success shadow-none post-submit">Post</button>
                </div>
            </div>
            <div class="row">
                <!-- collapse button for image uploading  -->
                <div class="col-6 m-2">
                    <div class="collapse" id="collapseExample">
                        <div class="form-group">
                            <input type="file" name="post-image"  id="image"  class="form-control-file post-image"
                                id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- error place  -->
                <div class="col">
                    <span class="text-danger error" style="user-select: none;"></span>
                </div>
            </div>
        </div>
    </div>
</div>