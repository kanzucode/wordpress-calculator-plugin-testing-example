(function ($) {
    $(document).ready(function () {
        var calculator = {};

        /**
         * Initialise plugin JS module
         */
        calculator.init = function () {
            calculator.items = [];
            calculator.manageFormInput();
        };

        calculator.manageFormInput = function(){
            $('#number_1,#number_2').on('input', function(){
                var num_1 = parseInt( $('#number_1').val() );
                var num_2 = parseInt( $('#number_2').val() );
                $.ajax({
                    url: links.ajax_url,
                    method: "POST",
                    data: {
                      number_1: num_1,
                      number_2: num_2,
                      action: "submit_cal_inputs"
                    },
            
                    success: function(result) {
                      $('#ans').val( result );
                    }
                  });
            });
        };

        $(calculator.init());
    });
})(jQuery);
