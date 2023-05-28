<!--Promotions-->
<form id="promotion-info-form" method="post">
    <div class="card mt-3">
        <div class="card-header">Promotions</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label>Date Promoted To</label>
                    <input type="text" id="promotion_date" class="form-control datepicker" name="promotion_date" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group col-4">
                    <label>Present Rank</label>
                    <input type="text" id="present_rank" class="form-control" name="present_rank">
                </div>
                <div class="form-group col-4">
                    <label>Substantive Rank</label>
                    <input type="text" id="substantive_rank" class="form-control" name="substantive_rank">
                </div>
            </div>

        </div>
    </div>

    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-promotion-info-container" class="float-right">
                <button id="btn-promotion-info-save" class="btn btn-primary" type="submit">
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
<!--Promotions-->
