    <script type="text/javascript">
        //�������
        $(".photo_miniature").on("mouseover", function() {
            $(this).siblings(".photo_miniature").removeClass('active');       
            $(this).addClass('active'); 
            var index = $(this).index();
            $(this).parents('.item').find('.popup_photo').hide();
            $(this).parents('.item').find('.popup_photo').eq(index).show();
            if ($(this).hasClass('last') && $(this).next().is('.photo_miniature')) {
                $(this).next().fadeIn(500).addClass("last");
                $(this).removeClass("last");
                $(this).parents('.item').find('.photo_miniature.first').hide().removeClass("first").next('.photo_miniature').addClass("first");
            }            
            if ($(this).hasClass('first') && $(this).prev().is('.photo_miniature')) {
                $(this).prev().fadeIn(500).addClass("first");
                $(this).removeClass("first");
                $(this).parents('.item').find('.photo_miniature.last').hide().removeClass("last").prev('.photo_miniature').addClass("last"); 
            }                  
        });
        //����������� ����
        $(".image_wrapper_block a").on("mouseover", function(){
            $('.catalog_photo_popup').hide();
            $(this).parents('.item').find('.catalog_photo_popup').show();             
        });
        //������� ����
        $('.catalog_photo_popup').on("mouseleave", function(){
              $('.catalog_photo_popup').hide();        
        });         
    </script>