<!--Hobbies Info-->
<form id="hobbies-info-form" method="post">
    <div class="card">
        <div class="card-header">Hobbies</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody id="hobbies-info-container"></tbody>

                    </table>
                </div>
            </div>

            <div class="form-row">
                <button id="add-new-hobby-row" class="btn btn-success" type="button">Add Row</button>
            </div>
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-hobbies-info-container" class="float-right">
                <button id="btn-hobbies-info-save" class="btn btn-primary" type="submit">
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
<!--Hobbies Info-->
