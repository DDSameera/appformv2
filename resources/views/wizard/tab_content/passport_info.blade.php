<!--Passport-->
<form id="passport-info-form" method="post">
    <div class="card mt-3">
        <div class="card-header">Passport Information</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label>Passport Id</label>
                    <input type="text" id="passport_id" class="form-control" name="passport_id">
                </div>
                <div class="form-group col-4">
                    <label>Passport Issue Date</label>
                    <input type="text" id="issued_date" class="form-control datepicker" name="issued_date" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group col-4">
                    <label>Passport Expire Date</label>
                    <input type="text" id="expire_date" class="form-control datepicker" name="expire_date" placeholder="YYYY-MM-DD">
                </div>
            </div>

        </div>
    </div>

    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-passport-info-container" class="float-right">
                <button id="btn-passport-info-save" class="btn btn-primary" type="submit">
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
<!--Passport-->
