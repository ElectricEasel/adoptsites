jQuery(document).ready(function ($) {

    $('[name="domain"]').change(function(){
        var $this = $(this);

        $.get('/create/ajax/checkDomainAvailability', {
            domain: $this.val()
        }, function (response) {
            console.log(response);
            if (response.exists) {
                $this.css('border-color', 'red');
            } else {
                $this.css('border-color', 'green');
            }
        }, 'json');
    });

});