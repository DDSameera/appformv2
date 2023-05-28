<!--Academic Education Info-->
<form id="military-course-info-form" method="post">
    <div class="card">
        <div class="card-header">All Military Courses Attended</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Course</th>
                            <th>Country</th>
                            <th>From Date</th>
                            <th>To Date</th>

                        </tr>
                        </thead>
                        <tbody id="military-course-info-container"></tbody>


                    </table>
                </div>
            </div>

            <div class="form-row">
                <button id="add-new-military-course-row" class="btn btn-success" type="button">Add Row</button>
            </div>

        </div>
        <div class="form-row mt-5">
            <div class="form-group col-12">
                <div id="btn-military-course-info-container" class="float-right">
                    <button id="btn-military-course-info-save" class="btn btn-primary" type="submit">
                        <span class="btn-text">Next </span>
                        <div class="preloader d-none">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="spinner-text">Saving...</span>
                        </div>

                    </button>
                </div>

            </div>
        </div>
    </div>
</form>
<!--Academic Education Info-->
