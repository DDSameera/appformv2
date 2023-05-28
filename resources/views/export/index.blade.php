@extends('layouts.pdf')

@section('content')
    <div class="container">
        <!--Title-->
        <div class="row">
            <div class="col-12">
                <h6 class="text-center"><u>PERSONAL DETAILS FORM</u></h6>
            </div>
        </div>
        <!--Title-->

        <!--Photo-->
        <div class="row">
            <div class="col-12">
                <div class="text-center mt-5">
                    @if(isset($users->profile_img) && File::exists(storage_path('app/uploads/images/'.$users->profile_img)))
                        <img class="img img-thumbnail" src="{{storage_path('app/uploads/images/'.$users->profile_img)}}"
                             width="130px" height="170px"/>
                    @endif
                </div>
            </div>
        </div>
        <!--Photo-->


    </div>
    <div class="row">
        <div class="col-12">
            <table width="100%" class="table table-responsive-sm">
                <tr>
                    <td class="font-weight-bold">1. Name in Full <br/> (Underline Surname)</td>

                    <td>
                        : {{(isset($users->fname) ?$users->fname : "" ) .' '. (isset($users->mname) ?$users->mname : "" ) }}
                        <u>{{(isset($users->lname) ?$users->lname : "" )}}</u>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">2. Firstname</td>
                    <td> : {{(isset($users->fname) ?$users->fname : "" ) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">3. Medals & Decorations</td>
                    <td>
                        <table>
                            <tbody>
                            @if(isset($medals_and_decorations))
                                @foreach($medals_and_decorations as $mad)

                                    <tr>
                                        <td>{{$mad->medal}}</td>
                                        <td>{{$mad->decoration}}</td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">4. National Identity Card No</td>
                    <td>{{(isset($users->nic) ?$users->nic : "" )}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">5. Passport No</td>
                    <td>
                        {{(isset($passport->passport_id) ?$passport->passport_id : "" )}}
                        <table>
                            <tr>
                                <td>a).Issued On</td>
                                <td> : {{ (isset($passport->issued_date) ?$passport->issued_date : "" ) }}</td>
                            </tr>
                            <tr>
                                <td>b). Expire On</td>
                                <td> :{{ (isset($passport->expire_date) ?$passport->expire_date : "" ) }}</td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td class="font-weight-bold">6. Date promoted To</td>
                    <td>

                        <table>
                            <tr>
                                <td>a).Present Rank</td>
                                <td>
                                    : {{(isset($promotionDetails->present_rank) ?$promotionDetails->present_rank : "" )}}</td>
                            </tr>
                            <tr>
                                <td>b). Substantive Rank</td>
                                <td>
                                    : {{(isset($promotionDetails->substantive_rank) ?$promotionDetails->substantive_rank : "" ) }}</td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 7. Service No</td>
                    <td>: {{(isset($service->no) ? $service->no: "")}}</td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 8. Service & Branch</td>
                    <td>: {{(isset($service->name) ? $service->name: "")}}
                        , {{ (isset($service->branch) ? $service->branch: "") }}</td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 9. Date of Enlistment</td>
                    <td>: {{(isset($service->date_enlistment) ? $service->date_enlistment: "")}}</td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 10. Date of Commission</td>
                    <td>: {{ (isset($service->date_commission) ? $service->date_commission: "") }}</td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 11. Date of Birth</td>
                    <td>: {{ (isset($service->date_of_birth) ?  $service->date_of_birth: "") }}</td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 12. Blood Group</td>
                    <td>: {{(isset($service->blood_group) ?$service->blood_group : "")}}</td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 13. Present Appointment</td>
                    <td>: {{(isset($service->present_appointment) ? $service->present_appointment : "")}}</td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 14. Office Address <br/><small>(Include Phone Number if any)</small>
                    </td>
                    <td>: {{(isset($contacts->office_address) ? $contacts->office_address: "") }}</td>

                </tr>

                <tr>
                    <td colspan="2" class="font-weight-bold"> 15. All Appointments Held (For last 10 Years)</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width="100%" class="table table-light table-bordered table-sm">
                            <tr>
                                <th>Ser</th>
                                <th>Appointment</th>
                                <th>Rank</th>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                            @if(isset($appointments))
                                @foreach($appointments as $apmnts)

                                    <tr>
                                        <td>{{$apmnts->serial_no}}</td>
                                        <td>{{$apmnts->appointment}}</td>
                                        <td>{{$apmnts->rank}}</td>
                                        <td>{{$apmnts->from_date}}</td>
                                        <td>{{$apmnts->to_date}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 16. Residential Address</td>
                    <td>: {{(isset($contacts->residential_address) ? $contacts->residential_address : "")	}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold"> 17. Contact Numbers</td>
                    <td>
                        <table class="table table-light table-bordered table-sm" width="100%">

                            <tr>
                                <td>Mobile</td>
                                <td>: {{(isset($contacts->mobile_contact) ? $contacts->mobile_contact : "")}}</td>

                            </tr>
                            <tr>
                                <td>Home</td>
                                <td>: {{(isset($contacts->home_contact) ? $contacts->home_contact: "")	}}</td>

                            </tr>

                        </table>
                    </td>

                </tr>
                <tr>
                    <td class="font-weight-bold"> 18. Email Address</td>
                    <td>: {{(isset($users->email) ? $users->email : "")	}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold"> 19. Whatsapp/Viber Contact</td>
                    <td>
                        <table width="100%">
                            @if(!empty($contacts->viber_contact))
                                <td>: {{$contacts->viber_contact	}} (Viber)</td>
                            @endif
                            @if(!empty($contacts->whatsapp_contact))
                                <td> {{$contacts->whatsapp_contact	}} (Whatsapp)</td>
                            @endif
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="font-weight-bold"> 20. Education</td>
                    <td>
                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tr>
                                <td colspan="2">
                                    <table class="table table-light table-bordered table-sm" width="100%">
                                        <tr>
                                            <th>School Attended</th>
                                            <th>Higher Education</th>
                                            <th>Qualification</th>
                                        </tr>
                                        @if(isset($higherEducation))
                                            @foreach($higherEducation as $he)
                                                <tr>
                                                    <td> {{$he->school}}</td>
                                                    <td> {{$he->higher_education}}</td>
                                                    <td> {{$he->qualification}}</td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <table class="table table-light table-sm table-bordered" width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 21. Details of Diplomas/Degrees/ Masters</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-light table-bordered table-sm  small" width="100%">
                                        <thead>
                                        <tr>
                                            <th rowspan="2">Ser</th>
                                            <th rowspan="2">Name of Diploma/Basic/Master, Etc.</th>
                                            <th rowspan="2">Institution</th>
                                            <th rowspan="2">Year of Award</th>
                                            <th colspan="2"> Tick if the Copy of the Certificate Attached</th>

                                        </tr>
                                        <tr>
                                            <td>Yes</td>
                                            <td>No</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($academicEducation))
                                            @foreach($academicEducation as $ae)
                                                <tr>
                                                    <td>{{$ae->serial_no}}</td>
                                                    <td>{{$ae->academic_qualification	}}</td>
                                                    <td>{{$ae->institute_name}}</td>
                                                    <td>{{$ae->award_year}}</td>
                                                    <td>&nbsp;<a target="_blank"
                                                                 href="{{url("secure/certificate/view/$ae->scanned_certificate")}}">Attachment</a>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 22. All military Courses Attended:</td>
                            </tr>
                            <tr>
                                <table width="100%" class="table table-light table-sm table-bordered">

                                    <thead>
                                    <tr>
                                        <th>Ser</th>
                                        <th>Course</th>
                                        <th>Country</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(isset($militaryCourse ))
                                        @foreach($militaryCourse as $mc)
                                            <tr>
                                                <td>{{$mc->serial_no}}</td>
                                                <td>{{$mc->course}}</td>
                                                <td>{{$mc->country}}</td>
                                                <td>{{$mc->from_date}}</td>
                                                <td>{{$mc->to_date}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>

                                </table>
                            </tr>

                        </table>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 23. Marital Status:</td>
                            </tr>
                            <tr>
                                <table width="100%" class="table">

                                    <tbody>
                                    <tr>
                                        <td width="30%">a). Name of Spouse</td>
                                        <td width="70%">: {{(isset($spouse->name) ? $spouse->name : "")}}</td>
                                    </tr>
                                    <tr>
                                        <td>b). Children</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table class="table table-light table-bordered table-sm" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Ser</th>
                                                    <th>Name</th>
                                                    <th>Male/Female</th>
                                                    <th>Age</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @if(isset($children))
                                                    @foreach($children as $child)
                                                        <tr>
                                                            <td>{{$child->serial_no}}</td>
                                                            <td>{{$child->name}}</td>
                                                            <td>{{$child->gender}}</td>
                                                            <td>{{$child->age}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>
                            </tr>

                        </table>
                    </td>

                </tr>

                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 24. Hobbies:</td>
                            </tr>
                            <tr>
                                <table class="table table-light table-md" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <ol type="a">
                                                @if(isset($hobbies))
                                                    @foreach($hobbies as $key=>$hob)
                                                        @php $key++; @endphp
                                                        <li>{{$hob->name}}</li>
                                                    @endforeach
                                                @endif
                                            </ol>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </tr>

                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <table class="table table-light table-bordered table-sm" width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 25. Languages Spoken and Fluency ( Excellent/
                                    Very good/ Good/ Average):
                                </td>
                            </tr>
                            <tr>
                                <table class="table table-light table-bordered table-sm" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Ser</th>
                                        <th>Language</th>
                                        <th>Speaking</th>
                                        <th>Writing</th>
                                        <th>Reading</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(isset($languages))
                                        @foreach($languages as $key=>$lang)
                                            @php $key++ @endphp
                                            <tr>
                                                <td> {{$key}}</td>
                                                <td> {{ucfirst($lang->type_name)}}</td>
                                                <td>{{$lang->speaking}}</td>
                                                <td>{{$lang->writing}}</td>
                                                <td>{{$lang->reading}}</td>

                                            </tr>
                                        @endforeach
                                    @endif


                                    </tbody>
                                </table>
                            </tr>

                        </table>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <table class="table table-light table-bordered table-sm" width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 26. Food Preferences of all Family Members
                                    (Veg/Non Veg):
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    @if(isset($foodPreferences))
                                        <table width="100%" border="1" class="table table-light">
                                            @foreach($foodPreferences as $key=>$fp)
                                                @php $key++;@endphp
                                                <tr>
                                                    <td>{{$key}}</td>
                                                    <td>{{$fp->member_type}}</td>
                                                    <td>{{$fp->food_type}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <table class="table table-light table-bordered table-sm" width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 27. COVID -19 Vaccination Details</td>
                            </tr>
                            <tr>
                                <table width="100%" border="1" class="table table-light">

                                    <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2">Ser</th>
                                        <th class="text-center" rowspan="2">Person</th>
                                        <th class="text-center" rowspan="2">Type of Vaccine</th>
                                        <th class="text-center" colspan="2">Date</th>

                                    </tr>
                                    <tr>

                                        <td align="center">1st</td>
                                        <td align="center">2nd</td>
                                    </tr>
                                    </thead>

                                    <tbody class="text-center">
                                    @if(isset($vaccination))
                                        @foreach($vaccination as $vacc)
                                            <tr>
                                                <td>{{$vacc->serial_no}}</td>
                                                <td>{{$vacc->person_type}}</td>
                                                <td>{{$vacc->vaccine_type}}</td>
                                                <td>{{$vacc->first_date}}</td>
                                                <td>{{$vacc->second_date}}</td>

                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>

                                </table>
                            </tr>

                        </table>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <table width="100%">
                            <tr>
                                <td colspan="2" class="font-weight-bold"> 28. Any other relavant information</td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    @if(empty($users->other_info))
                                        No
                                    @else
                                        {{$users->other_info}}
                                    @endif

                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>


            </table>
        </div>
    </div>
@endsection
