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


    calculator.manageFormInput = function () {
      $('#kz_wp_calc_number_1,#kz_wp_calc_number_2').on('input', function () {
        var number1 = parseInt($('#kz_wp_calc_number_1').val());
        var number2 = parseInt($('#kz_wp_calc_number_2').val());
        $.ajax({
          url: ajaxurl,
          method: "POST",
          data: {
            number_1: number1,
            number_2: number2,
            action: "kc_wp_cal_calculate_sum"
          },
          success: function (result) {
            $('#kz_wp_calc_sum').val(result);
          }
        });
      });

    };

    $(calculator.init());
  });
})(jQuery);
