window.addEvent('domready', function() {
    document.formvalidator.setHandler('title',
        function (value) {
            regex=/^\s{2,}$/gi;
            return regex.test(value);
        });
});