document.addEventListener("DOMContentLoaded", function () {
    var dropdownToggles = document.querySelectorAll('.dropdown-submenu a.dropdown-toggle');
    dropdownToggles.forEach(function (toggle) {
        toggle.addEventListener("click", function (e) {
            var nextElement = this.nextElementSibling;
            if (nextElement && nextElement.classList.contains('dropdown-menu')) {
                nextElement.classList.toggle('show');
            }
            e.stopPropagation();
            e.preventDefault();
        });
    });
});
