<style>
    .outer {
        margin: 0 auto;
        max-width: 800px;
    }

    #big .item {
        /* background: #ec6e46; */
        padding: 120px 0px;
        margin: 2px;
        color: #FFF;
        border-radius: 3px;
        text-align: center;
    }

    #thumbs .item {
        background: #C9C9C9;
        height: 70px;
        line-height: 70px;
        padding: 0px;
        margin: 2px;
        color: #FFF;
        border-radius: 3px;
        text-align: center;
        cursor: pointer;
    }

    #thumbs .item h1 {
        font-size: 18px;
    }

    #thumbs .current .item {
        /* background: #FF5722; */
    }

    .owl-theme .owl-nav [class*='owl-'] {
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
    }

    .owl-theme .owl-nav [class*='owl-'].disabled:hover {
        background-color: #D6D6D6;
    }

    #big.owl-theme {
        position: relative;
    }

    #big.owl-theme .owl-next,
    #big.owl-theme .owl-prev {
        background: #333;
        width: 22px;
        line-height: 40px;
        height: 40px;
        margin-top: -20px;
        position: absolute;
        text-align: center;
        top: 50%;
    }

    #big.owl-theme .owl-prev {
        left: 10px;
    }

    #big.owl-theme .owl-next {
        right: 10px;
    }

    #thumbs.owl-theme .owl-next,
    #thumbs.owl-theme .owl-prev {
        background: #333;
    }
</style>





<h1>Product Gallery Image </h1>
<div class="outer">
    <div id="big" class="owl-carousel owl-theme">

        @for ($i = 0; $i < count($imageGallery); $i++)
            <div class="item">
                <img style="height: 300px;width:500px" src="{{ asset('product/gallery/' . $imageGallery[$i]) }}"
                    alt="productgalleryImage" />
            </div>
        @endfor
        {{-- <div class="item">
                <img src="{{ asset('img/image-10.png') }}" width="100" height="300" />
            </div>
            <div class="item">
                <img src="{{ asset('img/image-11.png') }}" width="100" height="300" />
            </div> --}}

    </div>
    <div id="thumbs" class="owl-carousel owl-theme">

        @for ($i = 0; $i < count($imageGallery); $i++)
            <div class="item">
                <img style="height:90px;width:400px" src="{{ asset('product/gallery/' . $imageGallery[$i]) }}"
                    alt="productgalleryImage" />
            </div>
        @endfor
        {{-- <div class="item">
                <img src="{{ asset('img/cart.png') }}" width="50" height="50" />
            </div> --}}
        {{-- <div class="item">
                <img src="{{ asset('img/image-10.png') }}" width="50" height="50" />
            </div>
            <div class="item">
                <img src="{{ asset('img/image-11.png') }}" width="50" height="50" />
            </div> --}}


    </div>
</div>


<!-- Modal content goes here -->










<script>
    $(document).ready(function() {
        var bigimage = $("#big");
        var thumbs = $("#thumbs");
        //var totalslides = 10;
        var syncedSecondary = true;

        bigimage
            .owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [
                    '<i class="ti-arrow-left" aria-hidden="true"></i>',
                    '<i class="ti-arrow-right" aria-hidden="true"></i>'
                ]
            })
            .on("changed.owl.carousel", syncPosition);

        thumbs
            .on("initialized.owl.carousel", function() {
                thumbs
                    .find(".owl-item")
                    .eq(0)
                    .addClass("current");
            })
            .owlCarousel({
                items: 2,
                dots: true,
                nav: true,
                navText: [
                    '<i class="ti-arrow-left" aria-hidden="true"></i>',
                    '<i class="ti-arrow-right" aria-hidden="true"></i>'
                ],
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 4,
                responsiveRefreshRate: 100
            })
            .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            //var current = el.item.index;

            //to disable loop, comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            //to this
            thumbs
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumbs.find(".owl-item.active").length - 1;
            var start = thumbs
                .find(".owl-item.active")
                .first()
                .index();
            var end = thumbs
                .find(".owl-item.active")
                .last()
                .index();

            if (current > end) {
                thumbs.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumbs.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage.data("owl.carousel").to(number, 100, true);
            }
        }

        thumbs.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage.data("owl.carousel").to(number, 300, true);
        });
    });
</script>
