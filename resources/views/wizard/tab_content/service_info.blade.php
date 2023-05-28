<!--Service Info-->
<form id="service-info-form" method="post">
    <div class="card">
        <div class="card-header">Service Info</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label>Service No</label>
                    <input type="text" id="no" class="form-control" name="no">
                </div>
                <div class="form-group col-6">
                    <label>Service Name </label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                <div class="form-group col-6">
                    <label>Branch </label>
                    <input type="text" id="branch" class="form-control" name="branch">
                </div>
                <div class="form-group col-6">
                    <label>Date of Enlistment </label>
                    <input type="text" id="date_enlistment" class="form-control datepicker" name="date_enlistment" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group col-6">
                    <label>Date of Commission </label>
                    <input type="text" id="date_commission" class="form-control datepicker" name="date_commission" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group col-6">
                    <label>Date of Birth </label>
                    <input type="text" id="date_of_birth" class="form-control datepicker" name="date_of_birth" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group col-6">
                    <label>Blood Group </label>
                    <input type="text" id="blood_group" class="form-control" name="blood_group">
                </div>
                <div class="form-group col-6">
                    <label>Present Appointment </label>
                    <input type="text" id="present_appointment" class="form-control" name="present_appointment">
                </div>

            </div>
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-service-info-container" class="float-right">
                <button id="btn-service-info-save" class="btn btn-primary" type="submit">
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
<!--Service Info-->
