<!--Food Info-->
<form id="food-pref-info-form" method="post">
    <div class="card">
        <div class="card-header">Food Preferences of all Family Members</div>
        <div class="card-body">
            <div id="alert-messages"></div>
            <div class="form-row">

                @php
                    $familyMembers = ["student_officer","spouse","children"];
                    $foodTypes = ["veg","non_veg"];
                @endphp

                @foreach($familyMembers as $fm)
                    <div class="form-group col-4">
                        <label>{{$fm}} :</label>
                        @foreach($foodTypes as $ft)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input"
                                           name="{{$fm}}_food_type"
                                           value="{{$ft}}">
                                    {{$ft}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                @endforeach
            </div>
        </div>


    </div>
    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-food-pref-info-container" class="float-right">
                <button id="btn-food-pref-info-save" class="btn btn-primary" type="submit">
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
<!--Food Info-->
