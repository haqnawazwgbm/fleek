<script type="text/javascript">
    $(document).ready(function ($) {

        var jssor_1_options = {
            $AutoPlay: true,
            $AutoPlaySteps: 1,
            $SlideDuration: 160,
            $SlideWidth: 200,
            $SlideSpacing: 3,
            $Cols: 3,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 1
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*responsive code begin*/
        /*you can remove responsive code if you don't want the slider scales while window resizing*/
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 809);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        /*responsive code end*/
        // Get the modal
        var modal = document.getElementById('imageModal');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        $('.viewImage').click(function(){
            modal.style.display = "block";
            modalImg.src = this.children[0].src;

            captionText.innerHTML = this.children[0].alt;
        });

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("imageClose")[0];

// When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }


        //Upload slider image path from here.
        $('.imageUploadBtn').click(function() {
            var data = { path: $('#image').val(), poiID: {{ $markers->id }}, userID: {{ $markers->user_id }}}
            var path = $('#image').val();
            if (path != '') {
                $.ajax({
                    url: '/sliderImage',
                    data: data,
                    type: 'post',
                    success: function(e) {
                        location.reload();
                    }
                });
            }


        });
    });
</script>
<style>

    /* jssor slider bullet navigator skin 03 css */
    /*
    .jssorb03 div           (normal)
    .jssorb03 div:hover     (normal mouseover)
    .jssorb03 .av           (active)
    .jssorb03 .av:hover     (active mouseover)
    .jssorb03 .dn           (mousedown)
    */
    .jssorb03 {
        position: absolute;
    }
    .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
        position: absolute;
        /* size of bullet elment */
        width: 21px;
        height: 21px;
        text-align: center;
        line-height: 21px;
        color: white;
        font-size: 12px;
        background: url('/img/b03.png') no-repeat;
        overflow: hidden;
        cursor: pointer;
    }
    .jssorb03 div { background-position: -5px -4px; }
    .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
    .jssorb03 .av { background-position: -65px -4px; }
    .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

    /* jssor slider arrow navigator skin 03 css */
    /*
    .jssora03l                  (normal)
    .jssora03r                  (normal)
    .jssora03l:hover            (normal mouseover)
    .jssora03r:hover            (normal mouseover)
    .jssora03l.jssora03ldn      (mousedown)
    .jssora03r.jssora03rdn      (mousedown)
    .jssora03l.jssora03ldn      (disabled)
    .jssora03r.jssora03rdn      (disabled)
    */
    .jssora03l, .jssora03r {
        display: block;
        position: absolute;
        /* size of arrow element */
        width: 55px;
        height: 55px;
        cursor: pointer;
        background: url('/img/a03.png') no-repeat;
        overflow: hidden;
    }
    .jssora03l { background-position: -3px -33px; }
    .jssora03r { background-position: -63px -33px; }
    .jssora03l:hover { background-position: -123px -33px; }
    .jssora03r:hover { background-position: -183px -33px; }
    .jssora03l.jssora03ldn { background-position: -243px -33px; }
    .jssora03r.jssora03rdn { background-position: -303px -33px; }
    .jssora03l.jssora03lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
    .jssora03r.jssora03rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
</style>
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden;">
        @foreach ($markers->eventImages as $eventImage)

        <div style="display: none;" class="viewImage">
            <img data-u="image" src="{{ $eventImage->path }}" />
        </div>
        @endforeach
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype" style="width:21px;height:21px;">
            <div data-u="numbertemplate"></div>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
</div>
<div class="col-md-6">
    <div class="container_photo sliderImageUpload"></div>
    <button class="btn btn-md imageUploadBtn">Upload</button>
</div>
<!-- #endregion Jssor Slider End -->

<!-- The Modal -->
<div id="imageModal" class="imageModal">
    <span class="imageClose">&times;</span>
    <img class="imageModal-content" id="img01">
    <div id="caption"></div>
</div>