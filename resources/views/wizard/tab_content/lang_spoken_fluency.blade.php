<!--Language Spoken Fluency-->
@php

    $ratingLevels = ["average","good","very_good","excellent"];
     $fluencyAttributes=[
           [
            "lang"=>"sin",
            "speak" => $ratingLevels,
            "writing"=>$ratingLevels,
            "reading"=>$ratingLevels
            ],
           [
            "lang"=>"en",
            "speak" => $ratingLevels,
            "writing"=>$ratingLevels,
            "reading"=>$ratingLevels
            ],
             [
            "lang"=>"tm",
            "speak" => $ratingLevels,
            "writing"=>$ratingLevels,
            "reading"=>$ratingLevels
            ],
            [
             "lang"=>"other",
            "speak" => $ratingLevels,
            "writing"=>$ratingLevels,
            "reading"=>$ratingLevels
            ],
    ];
@endphp
<form id="lang-info-form" method="post">
<div class="card">
    <div class="card-header">Language Spoken and Fluency</div>
    <div class="card-body">
        <div id="alert-messages"></div>
        <div class="form-row">
            <div class="form-group col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Language</th>
                        <th>Speaking</th>
                        <th>Writing</th>
                        <th>Reading</th>

                    </tr>
                    </thead>
                    <tbody id="lang-spoken-fluency-info-container">
                    <!--Start Sinhala-->
                    <tr>
                        <td>1</td>
                        <td>Sinhala</td>

                    @foreach($fluencyAttributes as $key=>$fa)
                        <!--Speaking-->
                            @if($fa["lang"]==="sin")
                                <td>
                                    @foreach($fa["speak"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="speak_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Speaking-->
                            <!--Speaking-->

                            <!--Writing-->
                            @if($fa["lang"]==="sin")
                                <td>
                                    @foreach($fa["writing"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="writing_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Writing-->
                            <!--Writing-->

                            <!--Reading-->
                            @if($fa["lang"]==="sin")
                                <td>
                                    @foreach($fa["reading"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="reading_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Reading-->
                        @endforeach

                    </tr>
                    <!--End Sinhala-->

                    <!--Start English-->
                    <tr>
                        <td>2</td>
                        <td>English</td>

                    @foreach($fluencyAttributes as $key=>$fa)
                        <!--Speaking-->
                            @if($fa["lang"]==="en")
                                <td>
                                    @foreach($fa["speak"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="speak_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Speaking-->
                            <!--Speaking-->

                            <!--Writing-->
                            @if($fa["lang"]==="en")
                                <td>
                                    @foreach($fa["writing"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="writing_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Writing-->
                            <!--Writing-->

                            <!--Reading-->
                            @if($fa["lang"]==="en")
                                <td>
                                    @foreach($fa["reading"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="reading_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Reading-->
                        @endforeach

                    </tr>
                    <!--End English-->


                    <!--Start Tamil-->
                    <tr>
                        <td>3</td>
                        <td>Tamil</td>

                    @foreach($fluencyAttributes as $key=>$fa)
                        <!--Speaking-->
                            @if($fa["lang"]==="tm")
                                <td>
                                    @foreach($fa["speak"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="speak_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Speaking-->
                            <!--Speaking-->

                            <!--Writing-->
                            @if($fa["lang"]==="tm")
                                <td>
                                    @foreach($fa["writing"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="writing_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Writing-->
                            <!--Writing-->

                            <!--Reading-->
                            @if($fa["lang"]==="tm")
                                <td>
                                    @foreach($fa["reading"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="reading_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Reading-->
                        @endforeach

                    </tr>
                    <!--End Tamil-->

                    <!--Start Other-->
                    <tr>
                        <td>4</td>
                        <td>Other</td>

                    @foreach($fluencyAttributes as $key=>$fa)
                        <!--Speaking-->
                            @if($fa["lang"]==="other")
                                <td>
                                    @foreach($fa["speak"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="speak_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Speaking-->
                            <!--Speaking-->

                            <!--Writing-->
                            @if($fa["lang"]==="other")
                                <td>
                                    @foreach($fa["writing"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="writing_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Writing-->
                            <!--Writing-->

                            <!--Reading-->
                            @if($fa["lang"]==="other")
                                <td>
                                    @foreach($fa["reading"] as $spk)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input"
                                                       name="reading_{{$fa["lang"]}}_fluency"
                                                       value="{{$spk}}">
                                                {{$spk}}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            @endif
                        <!--Reading-->
                        @endforeach

                    </tr>
                    <!--End Other-->

                    </tbody>

                </table>
            </div>
        </div>


    </div>
</div>
    <div class="form-row mt-5">
        <div class="form-group col-12">
            <div id="btn-lang-info-container" class="float-right">
                <button id="btn-lang-info-save" class="btn btn-primary" type="submit">
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

<!--Language Spoken Fluency-->
