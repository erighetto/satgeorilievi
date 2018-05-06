require('../scss/app.scss');

/**
 * Image preview script
 * powered by jQuery (http://www.jquery.com)
 *
 * written by Alen Grakalic (http://cssglobe.com)
 *
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
jQuery.fn.extend(
    {
        imagePreview: function () {
            /* CONFIG */

            xOffset = 300;
            yOffset = 10;

            // these 2 variable determine popup's distance from the cursor
            // you might want to adjust to get the right result

            /* END CONFIG */
            $("a.preview").hover(function (e) {
                    this.t = this.title;
                    this.title = "";
                    var c = (this.t != "") ? "<br/>" + this.t : "";
                    $("body").append("<p id='preview'><img src='" + this.href.replace("strumenti/", "strumenti/thumb/") + "' alt='Image preview' />" + c + "</p>");
                    $("#preview")
                        .css("top", (e.pageY - xOffset) + "px")
                        .css("left", (e.pageX + yOffset) + "px")
                        .fadeIn("fast");
                },
                function () {
                    this.title = this.t;
                    $("#preview").remove();
                });
            $("a.preview").mousemove(function (e) {
                $("#preview")
                    .css("top", (e.pageY - xOffset) + "px")
                    .css("left", (e.pageX + yOffset) + "px");
            });
        },

        preLoadImages: function () {
            var cache = [];
            var args_len = arguments.length;
            for (var i = args_len; i--;) {
                var cacheImage = document.createElement('img');
                cacheImage.src = arguments[i];
                cache.push(cacheImage);
            }
        }
    });


// starting the script on page load
$(document).ready(function () {

    $(this).imagePreview();
    $(this).preLoadImages("assets/images/progetto2_on.jpg", "assets/images/progetto1_on.jpg", "assets/images/quotato1_on.jpg");


    $("#search_input").focus(function () {
        $(this).attr('value', '');
    });

    $('#search_input').blur(function () {
        if ($(this).val() == "") {
            $(this).attr('value', 'Scrivi qui il testo da cercare');
        }
    });

    $("img.rollover").hover(
        function () {
            this.src = this.src.replace("_off", "_on");
        },
        function () {
            this.src = this.src.replace("_on", "_off");
        }
    );

    $(".show-feature").hide();

    $(".feature").hover(function (e) {
            var children = $(this).children(".show-feature");

            if (children.is(":hidden")) {
                children
                    .css("top", (e.pageY - 200) + "px")
                    .css("left", (e.pageX + 10) + "px")
                    .css('display', 'block');
            }
        },
        function () {
            var children = $(this).children(".show-feature");
            children.css('display', 'none');
        }
    );

    if ($('a.preview').length > 0) {
        $('a.preview').featherlight({
            targetAttr: 'href'
        })
    }

    $('a.blank').attr('target', '_blank');

    $('a.email').each(function (i) {
        var text = $(this).text();
        var address = text.replace(" at ", "@");
        $(this).attr('href', 'mailto:' + address);
        $(this).text(address);
    });
});
