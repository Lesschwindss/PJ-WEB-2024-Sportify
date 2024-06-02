function isGymOpen() {
    const now = new Date();
    const day = now.getDay();
    const hour = now.getHours();
    const minute = now.getMinutes();

    // Horaire d'ouverture (0=Dimanche, 1=Lundi, ..., 6=Samedi)
    const openingHours = [
        { open: 8, close: 20 }, // Dimanche
        { open: 6, close: 22 }, // Lundi
        { open: 6, close: 22 }, // Mardi
        { open: 6, close: 22 }, // Mercredi
        { open: 6, close: 22 }, // Jeudi
        { open: 6, close: 22 }, // Vendredi
        { open: 8, close: 20 }  // Samedi
    ];

    const todayHours = openingHours[day];
    const currentTime = hour + minute / 60;

    if (currentTime >= todayHours.open && currentTime < todayHours.close) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function() {
    const statusElement = $('#open-status');
    if (isGymOpen()) {
        statusElement.text('La salle est actuellement ouverte').addClass('text-success');
    } else {
        statusElement.text('La salle est actuellement fermée').addClass('text-danger');
    }

    $('.dropdown-submenu a.dropdown-toggle').on("click", function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });
});
