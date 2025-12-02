// main.js - placeholder
document.addEventListener('DOMContentLoaded', function(){
    // Example: confirm delete links
    document.querySelectorAll('a[data-confirm]').forEach(function(el){
        el.addEventListener('click', function(e){
            if(!confirm(el.getAttribute('data-confirm'))) e.preventDefault();
        });
    });

    // Mobile nav toggle
    var toggle = document.querySelector('.nav-toggle');
    var nav = document.getElementById('siteNav');
    if (toggle && nav) {
        toggle.addEventListener('click', function(){
            var expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            nav.classList.toggle('show');
        });
        // close when clicking outside
        document.addEventListener('click', function(e){
            if (!nav.contains(e.target) && !toggle.contains(e.target)) {
                nav.classList.remove('show');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Small entrance animation for main container
    var main = document.querySelector('main.container');
    if (main) main.classList.add('fade-in');
});
