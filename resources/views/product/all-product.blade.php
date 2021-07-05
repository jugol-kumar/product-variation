<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/select.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .form-control-color{
            border:1px solid #ced4da;
        }
        .form-control-color,.optionInput{
            border-right: none;
            border-radius: 0px;
        }
        .add_button,.add_child_button,.add_child_button,.remove_button,.btn-outline-secondary{
            border: 1px solid #ced4da;
            border-left: none;
            border-radius: 0px;
        }
        .btn-check:focus+.btn-outline-secondary, .btn-outline-secondary:focus {
            box-shadow: none;
        }
        .btn-check:active+.btn-outline-secondary:focus, .btn-check:checked+.btn-outline-secondary:focus, .btn-outline-secondary.active:focus, .btn-outline-secondary.dropdown-toggle.show:focus, .btn-outline-secondary:active:focus {
            box-shadow: none;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #ced4da;
            outline: 0;
        }
        .select2-container .select2-selection--multiple {
            box-sizing: border-box;
            display: block;
            min-height: 40px;
            -webkit-user-select: none;
        }
        .select2-container--default .select2-selection--multiple {
            background-color: white;
            border: 1px solid #ced4da;
            cursor: text;
            border-radius: 0px !important;
            padding-bottom: 5px;
            padding-right: 5px;
            position: relative;
        }
        .select2 select2-container select2-container--default select2-container--above select2-container--focus
        {
            width: 223.109px;
            max-height: 40px;
            overflow-y: initial;
        }
        .select2 select2-container select2-container--default select2-container--focus select2-container--below{
            width: 223.109px;
            max-height: 40px;
            overflow-y: initial;
        }

        .card-style-top{
            border: none;
            box-shadow: 1px 1px 24px -2px #e0e0e0 inset, 0px 2px 14px 0px #000000;
        }
        .card-style{
            border: none;
            box-shadow: 1px 1px 24px -2px #e0e0e0 inset, 0px 2px 14px 0px #000000;
        }
    </style>

    <link
        rel="stylesheet"
        type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"
    />
    <style>
        .custom-file-container__image-preview{
            overflow-x: auto;
            max-height: 100px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">All Product</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="row mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($products as $pro)
                            <div class="card col-md-3 mx-2 my-2">
                                <div class="card-title">
                                    <a href="{{ route('singleProduct', $pro->id) }}" class="card-text">{{ $pro->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="row mt-3">
            <div class="card">
                <h3 class="card-title">Add Product</h3>
                <div class="card-body">
                    <form method="post" action="{{ route('addProduct') }}" class="g-3 needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card card-style-top">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Product Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter product title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card card-style">
                                <div class="card-body">
                                    <div class="field_wrapper">
                                        <div class="row mt-3 mb-5">

                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="color" name="color[0][]" class="form-control-color optionInput"/>
                                                    <a href="javascript:void(0);" class="add_button btn btn-outline-secondary">
                                                        <img src="{{ asset('img/add-icon.png') }}"/>
                                                    </a>
                                                </div>

                                                <div class="form-group">
                                                    <div class="custom-file-container" data-upload-id="firstImage">
                                                        <label>product Featured
                                                            <span class="custom-file-container__image-clear" title="Clear Image" ></span>
                                                        </label>
                                                        <label class="custom-file-container__custom-file">
                                                            <input type="file" name="color[0][image][]" class="custom-file-container__custom-file__custom-file-input" multiple accept="*" aria-label="Choose File" />
                                                            <span class="custom-file-container__custom-file__custom-file-control" ></span>
                                                        </label>
                                                        <div class="custom-file-container__image-preview"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="childSec" class="child_secton col-md-8" >
                                                <div class="form-group">
                                                    <div class="input-group">
{{--                                                        <input class="form-control col-md-3" value="KBC-{{ rand(000000, 999999) }}" disabled>--}}
                                                        <input type="text" class="form-control" name="color[0][sku][]" value="KBC-{{ rand(000000, 999999) }}">
                                                        <input type="text" class="form-control col-md-3" name="color[0][size][]" placeholder="Size...">
                                                        <input type="text" class="form-control col-md-3" name="color[0][price][]" placeholder="Price...">
                                                        <input type="text" class="form-control  col-md-3 optionInput" name="color[0][qty][]" placeholder="Quantity...">
                                                        <div class="input-group-append">
                                                            <a href="javascript:void(0);" class="add_child_button btn btn-outline-secondary"><img src="{{ asset('img/add-icon.png') }}"/></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary align-items-center">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>

<script src="{{ asset('js/select.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){

        var index = 0;
        var addButton = $('.add_button');
        var cardAdd = $('.card-style');

        //Once add button is clicked
        $(addButton).click(function(){
            index++;
            $(cardAdd).parent('div').append('<div>' +
                '<div class="card card-style mt-3">' +
                '<div class="card-body">' +
                '<div class="field_wrapper">' +
                '<div class="row mt-3 mb-3">' +
                '<div class="col-md-3">' +
                '<div class="input-group">' +
                '<input type="color" name="color['+index+'][]" id="colorId'+index+'" data-id="'+index+'" class="form-control-color optionInput"/>' +
                '<a href="javascript:void(0);" class="remove_button btn btn-outline-secondary" title="Add field">' +
                '<img src="{{ asset('img/remove-icon.png') }}"/></a>'+
                '</div>'+
                '<div class="form-group">'+
                '<div class="custom-file-container" data-upload-id="firstImage'+index+'">'+
                '<label>product Featured'+
                    '<span class="custom-file-container__image-clear" title="Clear Image" ></span>'+
                '</label>'+
                '<label class="custom-file-container__custom-file">'+
                    '<input type="file" name="color['+index+'][image][]" class="custom-file-container__custom-file__custom-file-input" multiple accept="*" aria-label="Choose File" />'+
                    '<span class="custom-file-container__custom-file__custom-file-control" ></span>'+
                '</label>'+
            '<div class="custom-file-container__image-preview"></div>'+
            '</div>' +
            '</div>' +
            '</div>' +
            '<div id="childSec" class="child_secton col-md-8" >' +
            '<div class="form-group"><div class="input-group">' +
            '<input type="text" class="form-control" name="color['+index+'][sku][]" value="KBC-'+ parseInt(Math.random()*999999)+'">' +
            '<input type="text" class="form-control col-md-3" name="color['+index+'][size][]" placeholder="Size...">' +
            '<input type="text" class="form-control col-md-3 optionInput" name="color['+index+'][price][]" placeholder="Price...">' +
            '<input type="text" class="form-control col-md-3 optionInput" name="color['+index+'][qty][]" placeholder="Quantity...">' +
            '<div class="input-group-append">'+
            '<a href="javascript:void(0);" class="add_child_button btn btn-outline-secondary" title="Add field">' +
            '<img src="{{ asset('img/add-icon.png') }}"/></a></div></div></div></div></div></div></div></div></div>'); //Add field html


                // $(cardAdd).parent('div').append(fieldHTML.replace('sku[0]', 'sku['+index+']')); //Add field html

            var upload = new FileUploadWithPreview(`firstImage${index}`);


        });

        //Once remove button is clicked
        $('body').on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').parent('div').parent('div').parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });


        //this is new code for card desing .
        $('body').on('click', '.add_child_button', function (e){
            $(this).parent('div').parent('div').parent('div').parent('div').append(`
        <div>
            <div class="input-group mt-2">
                <input type="text" class="form-control" name="color[${index}][sku][]" value="KBC-${ parseInt(Math.random()*999999) }">
                <input type="text" class="form-control col-md-3" name="color[${index}][size][]" placeholder="Size...">
                <input type="text" class="form-control col-md-3 optionInput" name="color[${index}][price][]" placeholder="Price...">
                <input type="text" class="form-control  col-md-3 optionInput" name="color[${index}][qty][]" placeholder="Quantity...">
                <div class="input-group-append">
                    <a href="javascript:void(0);" class="child_remove_button btn btn-outline-secondary" title="Add field"><img src="{{ asset('img/remove-icon.png') }}"/></a>
                </div>
            </div>
        </div>
       `);
        });


        var upload = new FileUploadWithPreview("firstImage");

        // var upload = new FileUploadWithPreview(`myUniqueUploadId${index}`);


        $('body').on('click', '.child_remove_button', function (e){
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').remove();
        })

    });


</script>
<script>
</script>

</body>
</html>
