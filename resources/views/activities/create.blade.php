<?php header('Access-Control-Allow-Origin: *'); ?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="jumbotron col-md-8 text-center">

    <h1>Create Activity</h1>
    </div>
    </div>
    <form action=" {{url('acts')}} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-3">
                <label for="CoverImage">Upload Cover Image</label>
                <div class="input-group">
                    <input type="file" name="cover_image" id="imgInp" class="form-control-file">
                </div>
                <div class="text-center">
                    <img id='img-upload' class="rouned mx-auto d-block">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-3">
                <label for="Title" class="form-control-label">Title: </label>
                <input type="text" name="title" class="form-control" placeholder="Enter the name of the activity" required>
                <div class="valid-feedback">Look Good!</div>
                <div class="invalid-feedback">Please enter</div>
            </div>
            <div class="col-md-1"></div>
            <div class="form-group col-md-3">
                <label for="Category">Category: </label>
                <select name="category_no" class="form-control">
                    <option>1: lecture</option>
                    <option>2: charity</option>
                    <option>3: career</option>
                    <option>4: outdoors</option>
                    <option>5: competition</option>
                    <option>6: exhibition</option>
                    <option>7: other</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-3">
                <label for="Title">Maximum number of people allowed: </label>
                <input type="number" name="num_ppl" class="form-control">
            </div>
            <div class="col-md-1"></div>
            <div class="form-group col-md-3">
                <label for="Location">Location: </label>
                <input type="text" name="location" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div class="form-group">
                        <label for="StartTime">Start Datetime: </label>
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" class="form-control" name="start_time">
                        &nbsp;
                        <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>

                        </span>
                    </div>
                </div>
            </div>
                
            <div class="col-md-1"></div>

            <div class="col-md-3">
                <div class="form-group">
                        <label for="EndTime">End Datetime: </label>
                    <div class="input-group date" id="datetimepicker2">
                        <input type="text" class="form-control" name="end_time">
                        &nbsp;
                        <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <label for="Body">Content</label>
                <textarea class="form-control" name="body" id="textbody" cols="95" rows="300" wrap="soft"></textarea>

            </div>

        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4 float-md-right">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>

        </div>


    
    </form>

</div>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker1").on("dp.change", function (e) {
                $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker2").on("dp.change", function (e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
            });
        });

$(document).ready( function() {
    	$(document).on('change', '.form-control-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.form-control-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});

    </script>

    <!-- Scripts -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'textbody' );
    </script> 
@stop