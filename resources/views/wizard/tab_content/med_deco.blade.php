<!--Basic Info-->
<form id="med-deco-info-form" method="post">
    <div class="card">
        <div class="card-header">Medals & Decorations</div>
        <div class="card-body">
            <div id="alert-messages"></div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <table class="table border-info">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>Medals</th>
                                <th>Decorations</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="med-deco-info-container"> </tbody>


                        </table>
                    </div>


                </div>



            <div class="form-row">
                <div class="form-group col-6">
                    <button type="button" id="add-new-md-row" class="btn btn-primary">Add New</button>
                </div>

            </div>
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-meddeco-info-container" class="float-right">
                <button id="btn-meddeco-info-save" class="btn btn-primary" type="submit">
                    <span class="btn-text">Next </span>
                    <div class="preloader d-none">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="spinner-text">Saving...</span>
                    </div>

                </button>
            </div>

        </div>
    </div>


    <!--Basic Info-->
</form>
