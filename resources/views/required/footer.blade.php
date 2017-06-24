    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var timer;
        $('.item-component').mouseenter(function(){
            var this_data = this;
            timer = setTimeout(function(){
                $('.item-component').find('.hovered').removeClass('selected');
                $(this_data).find('.hovered').addClass('selected');

                $('.item-component').removeClass('selected-main');
                $(this_data).addClass('selected-main');

                $('.rightsideloader').addClass('goleft');

                $('<img src="'+$(this_data).data('img')+'">').on('load', function(){
                    setTimeout(function() {
                        $('.rightsideloader').removeClass('goleft');
                    }, 500);

                    var this_original = this;
                    setTimeout(function() {
                        $('.rightside').empty();

                        $(this_original).appendTo('.rightside');
                        $('.rightside').append(
                            '<div class="entry"><span>Name</span><span>'+$(this_data).data('title')+'</span></div>'+
                            '<div class="entry"><span>Series</span></span><span>'+$(this_data).data('series')+'</span></div>'+
                            '<div class="entry"><span>Date Added</span><span>'+$(this_data).data('date')+'</span></div>'+
                            '<a class="readmore" href="/manga/'+$(this_data).data('slug')+'">More Information</a>'
                            );
                    }, 250);
                });


            }, 1000);
        }).mouseleave(function() {
            clearTimeout(timer);
        });
    </script>
    </body>
</html>
