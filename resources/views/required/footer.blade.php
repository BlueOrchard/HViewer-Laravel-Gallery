    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var timer;
        $('.item-component').mouseenter(function(){
            if(!$(this).hasClass("selected-main")){
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
            }
        }).mouseleave(function() {
            clearTimeout(timer);
        });

        if(window.query){
            if(query.query){
                $('input[name=q]').val(query.query);
            }

            if(query.language){
                $('input[value='+query.language+']').prop("checked", true);
            }

            if(query.tags){
                for(i = 0; i < query.tags.length; i++){
                    $('input[value='+query.tags[i]+']').prop("checked", true);
                }
            }

            if(query.artist){
                $('input[name=artist]').val(query.artist);
            }
        }
    </script>
    </body>
</html>
