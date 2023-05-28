<!--Martial Status Info-->
<form id="martial-status-info-form" method="post">
    <div class="card">
        <div class="card-header">Marital Status</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label>Name of Spouse</label>
                    <input type="text" class="form-control" name="name_of_spouse" id="name-of-spouse">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label>Children</label>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Male/Female</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="children-info-container">  </tbody>

                    </table>
                </div>
            </div>

            <div class="form-row">
                <button id="add-new-children-row" class="btn btn-success" type="button">Add Row</button>
            </div>
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-marital-status-info-container" class="float-right">
                <button id="btn-marital-status-info-save" class="btn btn-primary" type="submit">
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
<!--Martial Status Info-->
