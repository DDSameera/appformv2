<!--Basic Info-->
<form enctype="multipart/form-data" id="ajax-basic-info-form" method="post">

    <div class="card">
        <div class="card-header">Basic Information</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label>First Name</label>
                    <input type="text" id="fname" class="form-control" name="fname">
                </div>
                <div class="form-group col-6">
                    <label>Middle Name</label>
                    <input type="text" id="mname" class="form-control" name="mname">
                </div>
                <div class="form-group col-6">
                    <label>Last Name</label>
                    <input type="text" id="lname" class="form-control" name="lname">
                </div>
                <div class="form-group col-6">
                    <label>NIC</label>
                    <input type="text" id="nic" class="form-control" name="nic">
                </div>
                <div class="form-group col-6">
                    <label>Email</label>
                    <input type="text" id="email" class="form-control" name="email">
                </div>
                <div class="form-group col-6">
                    <label>Change Current Password</label>
                    <label class="badge badge-secondary">Leave blank if you don't want to change it</label>
                    <input type="password" id="password" class="form-control" name="password">
                </div>
                <div class="form-group col-6">
                    <label>Profile Image</label>
                    <img id="current_profile_image" src="#" class="rounded img-thumbnail d-none"/>
                    <input type="file" id="profile_image" class="form-control" name="profile_image"/>
                </div>
                <div class="form-group col-6">
                    <label>Other Information</label>
                    <textarea rows="4" id="other_info" class="form-control" name="other_info"> </textarea>

                </div>
            </div>


        </div>
    </div>


    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-basic-info-container" class="float-right">
                <button id="btn-basic-info-save" class="btn btn-primary" type="submit">
                    <span class="btn-text">Next </span>
                    <div class="preloader d-none">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="spinner-text">Saving...</span>
                    </div>

                </button>
            </div>

        </div>
    </div>

</form>
<!--Basic Info-->










