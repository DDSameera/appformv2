@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">

                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                       href="#v-pills-home" role="tab"
                       aria-controls="v-pills-home" aria-selected="true">Basic Information</a>

                    <a class="nav-link" id="v-pills-passport-tab" data-toggle="pill"
                       href="#v-pills-passport-info" role="tab"
                       aria-controls="v-pills-passport" aria-selected="true">Passport</a>


                    <a class="nav-link" id="v-pills-promotion-info-tab" data-toggle="pill"
                       href="#v-pills-promotion-info" role="tab"
                       aria-controls="v-pills-promotion" aria-selected="true">Promotion</a>

                    <a class="nav-link" id="v-pills-med-deco-tab" data-toggle="pill"
                       href="#v-pills-med-deco" role="tab"
                       aria-controls="v-pills-mde-deco" aria-selected="false">Medals & Decorations</a>

                    <a class="nav-link" id="v-pills-service-tab" data-toggle="pill"
                       href="#v-pills-service" role="tab"
                       aria-controls="v-pills-profile" aria-selected="false">Service</a>

                    <a class="nav-link" id="v-pills-appointments-tab" data-toggle="pill"
                       href="#v-pills-appointments" role="tab"
                       aria-controls="v-pills-appointments" aria-selected="false">Appointments</a>

                    <a class="nav-link" id="v-pills-contact-tab" data-toggle="pill"
                       href="#v-pills-contact" role="tab"
                       aria-controls="v-pills-contact" aria-selected="false">Contact Information</a>

                    <a class="nav-link" id="v-pills-education-tab" data-toggle="pill"
                       href="#v-pills-education" role="tab"
                       aria-controls="v-pills-education" aria-selected="false">Education Information</a>

                    <a class="nav-link" id="v-pills-academic-education-tab" data-toggle="pill"
                       href="#v-pills-academic-education" role="tab"
                       aria-controls="v-pills-academic-education" aria-selected="false">Academic Education
                    </a>

                    <a class="nav-link" id="v-pills-military-courses-tab" data-toggle="pill"
                       href="#v-pills-military-courses" role="tab"
                       aria-controls="v-pills-military-courses" aria-selected="false">Military Courses</a>

                    <a class="nav-link" id="v-pills-marital-status-tab" data-toggle="pill"
                       href="#v-pills-marital-status" role="tab"
                       aria-controls="v-pills-marital-status" aria-selected="false">Marital Statuses</a>

                    <a class="nav-link" id="v-pills-hobbies-tab" data-toggle="pill"
                       href="#v-pills-hobbies" role="tab"
                       aria-controls="v-pills-hobbies" aria-selected="false">Hobbies</a>

                    <a class="nav-link" id="v-pills-lang-spoken-fluency-tab" data-toggle="pill"
                       href="#v-pills-lang-spoken-fluency" role="tab"
                       aria-controls="v-pills-lang-spoken-fluency" aria-selected="false">Language Spoken and Fluency</a>

                    <a class="nav-link" id="v-pills-food-info-tab" data-toggle="pill"
                       href="#v-pills-food-info" role="tab"
                       aria-controls="v-pills-food-info" aria-selected="false">Food Info</a>

                    <a class="nav-link" id="v-pills-vacc-info-tab" data-toggle="pill"
                       href="#v-pills-vacc-info" role="tab"
                       aria-controls="v-pills-vacc-info" aria-selected="false">COVID-19 Vaccination Info</a>


                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                        @include('wizard.tab_content.basic_info')
                    </div>
                    <div class="tab-pane fade" id="v-pills-passport-info" role="tabpanel"
                         aria-labelledby="v-pills-passport-info-tab">
                        @include('wizard.tab_content.passport_info')
                    </div>
                    <div class="tab-pane fade" id="v-pills-promotion-info" role="tabpanel"
                         aria-labelledby="v-pills-promotion-info-tab">
                        @include('wizard.tab_content.promotion_info')
                    </div>
                    <div class="tab-pane fade" id="v-pills-med-deco" role="tabpanel"
                         aria-labelledby="v-pills-passport-tab">
                        @include('wizard.tab_content.med_deco')
                    </div>
                    <div class="tab-pane fade" id="v-pills-service" role="tabpanel"
                         aria-labelledby="v-pills-messages-tab">
                        @include('wizard.tab_content.service_info')
                    </div>
                    <div class="tab-pane fade" id="v-pills-appointments" role="tabpanel"
                         aria-labelledby="v-pills-appointments-tab">
                        @include('wizard.tab_content.appointments_info')
                    </div>
                    <div class="tab-pane fade" id="v-pills-contact" role="tabpanel"
                         aria-labelledby="v-pills-contact-tab">
                        @include('wizard.tab_content.contact_info')
                    </div>

                    <div class="tab-pane fade" id="v-pills-education" role="tabpanel"
                         aria-labelledby="v-pills-education-tab">
                        @include('wizard.tab_content.higher_edu_info')
                    </div>

                    <div class="tab-pane fade" id="v-pills-academic-education" role="tabpanel"
                         aria-labelledby="v-pills-academic-education-tab">
                        @include('wizard.tab_content.academic_info')
                    </div>

                    <div class="tab-pane fade" id="v-pills-military-courses" role="tabpanel"
                         aria-labelledby="v-pills-military-courses-tab">
                        @include('wizard.tab_content.military_courses_info')
                    </div>

                    <div class="tab-pane fade" id="v-pills-marital-status" role="tabpanel"
                         aria-labelledby="v-pills-marital-status-tab">
                        @include('wizard.tab_content.marital_status_info')
                    </div>

                    <div class="tab-pane fade" id="v-pills-hobbies" role="tabpanel"
                         aria-labelledby="v-pills-hobbies-tab">
                        @include('wizard.tab_content.hobbies_info')
                    </div>

                    <div class="tab-pane fade" id="v-pills-lang-spoken-fluency" role="tabpanel"
                         aria-labelledby="v-pills-lang-spoken-fluency-tab">
                        @include('wizard.tab_content.lang_spoken_fluency')
                    </div>

                    <div class="tab-pane fade" id="v-pills-food-info" role="tabpanel"
                         aria-labelledby="v-pills-food-info-tab">
                        @include('wizard.tab_content.food_info')
                    </div>
                    <div class="tab-pane fade" id="v-pills-vacc-info" role="tabpanel"
                         aria-labelledby="v-pills-vacc-info-tab">
                        @include('wizard.tab_content.vacc_info')
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
