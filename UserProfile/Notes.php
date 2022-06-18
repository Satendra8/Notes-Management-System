<?php require("./include/header.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid px-lg-4">
    <div class="row">
        <div class="col-md-12 mt-lg-4 mt-5">
            <!-- Start DropDownList  -->
            <div class="col-md-6 m-auto">
                <select name="course" id="course" class="form-control">
                    <option value="">--Select-Course--</option>
                    <option value="btech">Btech</option>
                    <option value="mca">M.C.A</option>
                    <option value="bca">B.C.A</option>
                </select>
            </div>

            <!-- End DropDownList  -->

            <!-- Start DropDownList  -->
            <div class="col-md-6 m-auto">
                <select name="year" id="year" class="form-control">
                    <option value="">--Select-Year--</option>
                    <option value="first">First Year</option>
                    <option value="second">Second Year</option>
                    <option value="third">Third Year</option>
                    <option value="fourth">Fourth Year</option>
                </select>
            </div>
            <!-- End DropDownList  -->
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>



<?php require("include/footer.php"); ?>