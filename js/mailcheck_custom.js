/* Vérification du champ e-mail */

$('input[name=email]').on('blur', function() {
    $(this).mailcheck({
        topLevelDomains: [],
        suggested: function(element, suggestion) {
            if (typeof console != 'undefined') {
                $('.emailsuggestion').show();
                $('#emailsuggestion').html(suggestion.full);
            }
        },
        empty: function(element) {
        }
    });
});
