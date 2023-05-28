<!--Contact Info-->
<form id="contact-info-form" method="post">
    <div class="card">
        <div class="card-header">Contact Information</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label>Office Address</label>
                    <textarea id="office-address" class="form-control" name="office_address"></textarea>
                </div>
                <div class="form-group col-6">
                    <label>Residential Address</label>
                    <textarea id="residential-address" class="form-control" name="residential_address"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label>Mobile Contact Number</label>
                    <input type="text" id="mobile-contact" class="form-control" name="mobile_contact"/>
                </div>
                <div class="form-group col-6">
                    <label>Home Contact Number</label>
                    <input type="text" id="home-contact" class="form-control" name="home_contact"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label>Whatsapp Number</label>
                    <input type="text" id="whatsapp-contact" class="form-control" name="whatsapp_contact"/>
                </div>
                <div class="form-group col-6">
                    <label>Viber Number</label>
                    <input type="text" id="viber-contact" class="form-control" name="viber_contact"/>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-contact-info-container" class="float-right">
                <button id="btn-contact-info-save" class="btn btn-primary" type="submit">
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
<!--Contact Info-->