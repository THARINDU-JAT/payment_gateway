$(document).ready(function() {
    $('.pay').attr('disabled', true);
    $("#search").click(function() {

        var pol_no = $("#tpolicy").val();
        if (pol_no != "") {

            var $input = $('<button type="submit" name="paynow" id="paynow" class="w-30 btn btn-lg btn-danger mt-3">Pay Now</button>');
            // var pol_no = $("#tpolicy").val();
            //var $link = 'http://116.12.80.89:8001/ThirdPartyPolicy/GetPolicy?policyNo=' + pol_no;
            var $link = 'https://online.ci.lk/pol_info.php?policyNo=' + pol_no + '&type=thp';

            //alert ($link);

            $.getJSON($link, function(result) {

                //alert("sadasd");

                if (result.policyNo != null) {
                    $('.policy').empty().val(result.policyNo);
                    $('.vehi').empty().val(result.vehicleNo);
                    $('.name').empty().val(result.customerName);
                    $('.period').empty().val(result.policyPeriod);
                    $('.pre').empty().val(result.premium);


                    if (result.premium > 0) {
                        $('.pay').empty().val(result.premium);
                        $('.pay').attr('disabled', false);
                        $('.paybtn').empty().append($input);
                    } else {
                        $('.paybtn').empty();
                        $('.pay').attr('disabled', true);
                        $('.pay').empty().val("You have no outstanding to pay!");
                    }
                } else {
                    $('.policy').empty().append("No records found!");
                }




            });

        } else {
            alert("Please enter a policy number!");
        }



    });

});
