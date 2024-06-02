$(document).ready(function() {
    $('#appointmentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var coachId = button.data('coach-id');
        var coachName = button.data('coach-name');

        var modal = $(this);
        modal.find('#coachId').val(coachId);
        modal.find('#coachName').val(coachName);

        // Charger les jours valides pour le coach
        $.ajax({
            url: '../php/get_valid_days.php',
            type: 'GET',
            data: { coach_id: coachId },
            success: function(response) {
                var validDays = JSON.parse(response);
                var validDaysMap = {
                    'Lundi': 1,
                    'Mardi': 2,
                    'Mercredi': 3,
                    'Jeudi': 4,
                    'Vendredi': 5
                };

                $('#calendar').fullCalendar('destroy'); // Détruire le calendrier précédent

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    selectable: true,
                    selectHelper: true,
                    validRange: function(nowDate) {
                        return {
                            start: nowDate
                        };
                    },
                    dayRender: function(date, cell) {
                        var day = date.day();
                        if (!Object.values(validDaysMap).includes(day)) {
                            cell.addClass('fc-disabled-day');
                        } else {
                            cell.addClass('fc-available-day');
                        }
                    },
                    dayClick: function(date, jsEvent, view) {
                        if (!$(this).hasClass('fc-disabled-day')) {
                            $('.fc-selected-day').removeClass('fc-selected-day');
                            $(this).addClass('fc-selected-day');
                            var selectedDay = date.format('YYYY-MM-DD');
                            var dayOfWeek = Object.keys(validDaysMap).find(key => validDaysMap[key] === date.day());
                            $('#appointmentDate').val(selectedDay);

                            // Charger les créneaux horaires disponibles
                            $.ajax({
                                url: '../php/get_available_times.php',
                                type: 'GET',
                                data: { coach_id: coachId, day: dayOfWeek },
                                success: function(response) {
                                    var times = JSON.parse(response);
                                    var $appointmentTime = $('#appointmentTime');
                                    $appointmentTime.empty();
                                    $appointmentTime.append('<option value="">Sélectionnez une heure</option>');
                                    times.forEach(function(time) {
                                        $appointmentTime.append('<option value="' + time + '">' + time + '</option>');
                                    });
                                }
                            });
                        }
                    }
                });
            }
        });

        $('#appointmentForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '../php/make_appointment.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.success) {
                        alert('Rendez-vous pris avec succès.');
                        $('#appointmentModal').modal('hide');
                        location.reload();
                    } else {
                        alert('Erreur: ' + result.error + ' Détails: ' + result.details);
                    }
                },
                error: function() {
                    alert('Erreur lors de la prise de rendez-vous. Veuillez réessayer.');
                }
            });
        });
    });
});
