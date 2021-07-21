<ul class="profile">
   
    @foreach ($t_data as $Tutors)
            <li class="tutor row tutor1 tutor_success">
                <div class="photo col-md-2 col-sm-8 col-xs-8">
                    <div class="gallery">
                        <a href="public\images\{{ $Tutors->id }}.jpg">
                            <img src="public\images\{{ $Tutors->id }}.jpg" alt="Cinque Terre" width="600" height="400">
                        </a>
                    </div>
                </div>

                <div class="description col-md-7 col-sm-8">
                    <div class="first-line">
                        <h4 class="Name"> {{ $Tutors->name }}</h4>
                    </div>

                    <div class="second-line">
                        <span class="ShortBio___1gIDW">{{ $Tutors->des }}</span>
                    </div>
                </div>
                <div class="content col-md-3">
                    <div class="CoreIndicatorsWrap____8r4Z">
                        <div class="CoreIndicatorsItem___1niNK">
                            <div class="PriceIndicator___1doEU">
                                <div class="PriceIndicatorPrice___w9jW1">
                                    <div class="">$</div>
                                    <div class="PriceIndicatorValue___1kV4p PriceIndicatorValueSecond___1vI6H" data-qa-group="tutor-price-value">{{ $Tutors->tuition }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btns row">
                        
                        <div class="btn_1 col-md-12 "> <a href="/payment_select" class="btn btn-success btn-2 payment-btn">Make
                                a Payment</a> </div>
                    </div>
                </div>

            </li>
            @endforeach
</ul>
<div class="d-flex justify-content-center">
     {!! $t_data->links() !!}
</div>
