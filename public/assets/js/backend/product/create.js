var PollCreate = function() {
    var addValidationRules = function(formElement) {
        var $formElement = $(formElement);
        var $inputs = $formElement.find('input[name^="answers"]');

        var addRequiredValidation = function() {
            $(this).rules('add', {
                required: true
            });
        };

        $inputs.filter('input[name$="[answer]"]').each(addRequiredValidation);
    };

    var initFormRepeaters = function() {
        var $repeater = $('.repeater').repeater({
            show: function () {
                $(this).slideDown();
                addValidationRules(this);
                repeaterIncrementText();
            },
            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
                setTimeout(function() {
                    repeaterIncrementText();
                }, 1000);
            },
            isFirstItemUndeletable: true,
        });
    };

    var repeaterIncrementText = function() {
        var repeaterIncrement = 0;
        $(".js-polls-answer .form-group").each(function(index) {
            $(this).find('label').text('Option '+ repeaterIncrement+':');
            repeaterIncrement++;
        });
    }
    return {
        init: function() {
            initFormRepeaters();
        }
    };
}();

// Initialize when page loads
jQuery(function() {
    PollCreate.init();
});
