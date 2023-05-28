<!--Vaccine Info-->
<form id="vacc-info-form" method="post">
    <div class="card">
        <div class="card-header">COVID-19 Vaccination Details</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-12 ">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="align-middle" rowspan="2">#</th>
                            <th class="align-middle" rowspan="2">Person</th>
                            <th class="align-middle" rowspan="2">Type of Vaccine</th>
                            <th class="align-middle text-center" colspan="2">Date</th>
                        </tr>
                        <tr>
                            <th class="text-center">1st</th>
                            <th class="text-center">2nd</th>
                        </tr>
                        </thead>
                        <tbody id="vacc-info-container">   </tbody>


                    </table>
                </div>
            </div>

            <div class="form-row">
                <button id="add-new-vacc-row" class="btn btn-success" type="button">Add Row</button>
            </div>
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-vacc-info-container" class="float-right">
                <button id="btn-vacc-info-save" class="btn btn-primary" type="submit">
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
<!--Vaccine Info-->
