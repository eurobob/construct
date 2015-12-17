var App = function() {

    var current_page_name;

    // Page-specific scripts
    var site_methods = {

        home: function() {

        }
    };

    // Global functions
    var siteWide = {

        init: function() {

        }
    };

    return {

        // Public functions
        init: function(current_page) {
            current_page_name = page_name;
        },

        page_load: function() {
            // Run global functions
            siteWide.init();

            if (site_methods.hasOwnProperty(page_name)) { 
                site_methods[page_name]();
            }

        }
    };
}();

(function(){
    App.init(page_name);
    App.page_load();
})();