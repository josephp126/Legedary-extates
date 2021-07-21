@extends('layouts.default')

@section('content')

<!-- ======= Hero Section ======= -->


<div class="main1">
    <div class="row">

        <div class="col-md-6 col-xs-6">
            <label for="inputPhone" class="label_tuition">Price (1$~10000$)</label>
            <div class="slider_range">
                <input type="text" class="js-range-slider " name="my_range" value="" />
            </div>
        </div>

        <div class="col-md-6 col-xs-6" style="display: flex; justify-content: center; align-items: center;">
            <div class="container-search">
                <div class="input-group">
                    <input type="text" class="form-control" name="tutor_name" id="search" value={!! isset($keyword) ? $keyword :"" !!} >
                    <div>
                        <!-- <span class="input-group-btn"> -->
                        <button class="btn btn-search btn-search"  type="button"><i class="fa fa-search fa-fw"></i>
                            Search</button>
                        <!-- </span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container2" id="tutor_results">
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
                        
                        <div class="btn_1 col-md-12 "> <a href="/stripe/{{ $Tutors->tuition }}/{{ $Tutors->name }}" name="{{ $Tutors->tuition }}" id="{{ $Tutors->name }}" class="btn btn-success btn-2 payment-btn">Make
                                a Payment</a> </div>
                    </div>
                </div>

            </li>
            @endforeach
        </ul>
        <div class="d-flex justify-content-center">
            {!! $t_data->appends(Request::all())->links() !!}
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        var from = 0,
            to = 10000;

        function general_search(major, country, native_lang, also, name, from, to, page) {
            $.ajax({
                url: "/general_search",
                type: 'GET',
                data: {
                    major: major,
                    country: country,
                    native_lang: native_lang,
                    also: also,
                    name: name,
                    from: from,
                    to: to,
                    page: page
                },
                success: function(data) {
                    $("#tutor_results").html(data);
                    $('.page-link').removeAttr('href');
                },
                error: function(response) {
                    console.log(response);
                }
            })
        };
        $('#tutor_results').on('click', '.page-link', function() {
            if (!$(this).hasClass('active')) {
                var major = $('.tutor_major').val();
                var name = $('.tutor_name').val();
                var country = $('.tutor_country').val();
                var native_lang = $('.tutor_lang').val();
                var also = $('.tutor_also').val();
                var tuition = $('.tutor_tuition').val();
                var page = Number($(this).text());

                general_search(major, country, native_lang, also, name, from, to, page);
            }
        });


        $(document).on('keyup', '#search', function() {
            var name = $(this).val();
            var major = $('.tutor_major').val();
            var country = $('.tutor_country').val();
            var native_lang = $('.tutor_lang').val();
            var also = $('.tutor_also').val();
            var tuition = $('.tutor_tuition').val();
            general_search(major, country, native_lang, also, name, from, to, 1);
        });


        $('.tutor_major').on('change', function(e) {
            var name = $('.tutor_name').val();
            var major = $(this).val();
            var country = $('.tutor_country').val();
            var native_lang = $('.tutor_lang').val();
            var also = $('.tutor_also').val();
            var tuition = $('.tutor_tuition').val();
            general_search(major, country, native_lang, also, name, from, to, 1);
        });

        $('.tutor_country').on('change', function(e) {
            var name = $('.tutor_name').val();
            var country = $(this).val();
            var major = $('.tutor_major').val();
            var native_lang = $('.tutor_lang').val();
            var also = $('.tutor_also').val();
            var tuition = $('.tutor_tuition').val();
            general_search(major, country, native_lang, also, name, from, to, 1);
        });

        $('.tutor_language').on('change', function(e) {
            var name = $('.tutor_name').val();
            var native_lang = $(this).val();
            var major = $('.tutor_major').val();
            var country = $('.tutor_country').val();
            var also = $('.tutor_also').val();
            var tuition = $('.tutor_tuition').val();
            general_search(major, country, native_lang, also, name, from, to, 1);
        });


        $('.tutor_also').on('change', function(e) {
            var name = $('.tutor_name').val();
            var also = $(this).val();
            var major = $('.tutor_major').val();
            var native_lang = $('.tutor_lang').val();
            var country = $('.tutor_country').val();
            var tuition = $('.tutor_tuition').val();
            general_search(major, country, native_lang, also, name, from, to, 1);
        });

        $(".js-range-slider").ionRangeSlider({
            type: "double",
            skin: "big",
            min: 0,
            max: 10000,
            from: 0,
            to: 10000,
            prefix: "$",
            onFinish: function(data) {
                console.log('---------------', data);
                from = data.from;
                to = data.to;
                var name = $('.tutor_name').val();
                var major = $('.tutor_major').val();
                var native_lang = $('.tutor_lang').val();
                var country = $('.tutor_country').val();
                var tuition = $('.tutor_tuition').val();
                var also = $('.tutor_also').val();
                general_search(major, country, native_lang, also, name, from, to, 1);
            },
        });
    });
</script>

@endpush
@endsection