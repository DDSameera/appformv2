<!--Appointments Info-->
<form id="appointment-info-form" method="post">
    <div class="card">
        <div class="card-header">All Appointments Held (For last 10 Years):</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="row">
                <div class="col-12  table-responsive ">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Appointment</th>
                            <th>Rank</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="appointment-info-container"> </tbody>


                    </table>
                    <button id="add-new-appointment-row" class="btn btn-success" type="button">Add Row</button>

                </div>
            </div>


        </div>
    </div>

    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-appointment-info-container" class="float-right">
                <button id="btn-appointment-info-save" class="btn btn-primary" type="submit">
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
<!--Appointments Info-->
