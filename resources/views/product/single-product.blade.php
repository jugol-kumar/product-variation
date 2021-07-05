<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        #carouselExampleControls,#carouselExampleControls2{
            width:40% !important;
        }
        .carousel-item{
            max-height: 300px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Single Product Page</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/add-product') }}">All Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="row mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        {{ $product->title }}
                    </div>
                    <div class="row" id="ajaxColor">
                        <div class="card-text">
                            Available Color For This Product
                        </div>
                        @foreach($product->colors as $pro)
                            <div class="card col-md-3 mx-2 my-2" style="background: {{ $pro->color_code }}">
                                <div class="card-title">
                                    <a onclick="singleProductColors({{$pro->id}})" class="d-flex">
                                        <span>{{ $pro->color_code }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>



                    <div class="row" id="sizeWiseColor" style="display: none;">
                        <div class="card-text">
                            Available Color For This Product
                        </div>
                            <div class="card col-md-3 mx-2 my-2" style="background: {{ $pro->color_code }}">
                                <div class="card-title" id="ajaxColorButton">
                                </div>
                            </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <select id="allSize" name="option"  class="form-control allsize">
                                <option>~~ Check Available Size ~~</option>
                                @foreach($product->colors[1]->sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card-text">
                            Available Size For This Color
                        </div>
                        <div class="card-body">
                            <button id="ColorName" class="btn" ></button>
                        </div>
                    </div>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $i = 1?>
                            @foreach($product->colors[1]->images as $img)
                                @if($i==1)
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('storage/product')}}/{{$img->image}}" alt="First slide">
                                </div>
                                @else
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('storage/product')}}/{{$img->image}}" alt="First slide">
                                    </div>
                                @endif
                                <?php $i++ ?>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div id="carouselExampleControls2" class="secondCarosel carousel slide d-none " data-ride="carousel">
                        <div class="carousel-inner">
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

{{--    $('document').ready(function () {--}}
{{--        $.ajax({--}}
{{--            url: "{{ route('singleProductColorOneId',"")}}/" + 1,--}}
{{--            type: "GET",--}}
{{--            dataType: "JSON",--}}
{{--            success:function (res){--}}
{{--                console.log(res);--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}

    function singleProductColors(id){
        if (id != null){
            $.ajax({
                url: "{{ route('singleProductColor',"")}}/"+id,
                type: "GET",
                dataType: "JSON",
                data: id,
                success: function (res){
                    if (res.sizes != null){
                        // console.log(res.sizes);
                        $('#ColorName').css('background',res.color_code);
                        $('#allSize').empty();
                        $.each(res.sizes, function (size, key){
                            $('#allSize').append('<option class="sizeOption" value='+key.id+'>'+ key.size + '</option>');
                        });
                        $('.carousel-inner').empty();
                        let j=1;
                        $.each(res.images, function(key, value){
                            $('#carouselExampleControls').addClass('d-none');
                            $('.secondCarosel').removeClass('d-none');
                                if (j==1){
                                    $('.carousel-inner').append(`
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('storage/product')}}/${value.image}" alt="First slide">
                                    </div>
                                `)
                                }else{
                                    $('.carousel-inner').append(`
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('storage/product')}}/${value.image}" alt="First slide">
                                    </div>
                                `)
                                }
                            // $('.carousel').carousel();
                            j++;
                        })
                    }else{
                        alert('no Data available ');
                        $('#allSize').css('display', 'none');
                    }
                }
            })
        }
    }


    $("select.allsize").change(function() {
        var id = $(this).children("option:selected").val();
        if (id != null) {
            $.ajax({
                url: "{{ route('singleProductSize',"")}}/"+id,
                type: "GET",
                dataType: "JSON",
                success: function (res) {
                    if (res.colors != null){


                        // $('#ajaxColor').css('display', 'none');
                        $('#ajaxColorButton').empty();
                        $.each(res.colors, function (key, value){
                            $('#sizeWiseColor').css('display', 'block');
                            $('#ajaxColorButton').append(`<button class="btn" style="background:${value.color_code}">${value.color_code}</button>`)
                        })
                    }else{
                        $('#sizeWiseColor').css('display', 'none');
                        alert('no Data available ');
                    }
                }
            });
        }
    });


</script>



</body>
</html>
