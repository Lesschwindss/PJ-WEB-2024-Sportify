$(document).ready(function() {
    $.ajax({
        url: '../php/get_user_appointments.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response); // Affiche les données brutes dans la console
            if (response.error) {
                alert('Erreur: ' + response.error);
                return;
            }
            if (response.upcoming_appointments.length > 0) {
                var upcomingAppointmentsHtml = '<ul>';
                response.upcoming_appointments.forEach(function(appointment) {
                    upcomingAppointmentsHtml += '<li>';
                    upcomingAppointmentsHtml += '<strong>Coach:</strong> ' + appointment.first_name + ' ' + appointment.last_name + '<br>';
                    upcomingAppointmentsHtml += '<strong>Date et Heure:</strong> ' + appointment.appointment_date + '<br>';
                    upcomingAppointmentsHtml += '<strong>Adresse:</strong> ' + appointment.address + '<br>';
                    upcomingAppointmentsHtml += '<strong>Document Requis:</strong> ' + appointment.document_requested + '<br>';
                    upcomingAppointmentsHtml += '<strong>Digicode:</strong> ' + appointment.digicode + '<br>';
                    upcomingAppointmentsHtml += '<form action="../php/cancel_appointment.php" method="post">';
                    upcomingAppointmentsHtml += '<input type="hidden" name="appointment_id" value="' + appointment.appointment_id + '">';
                    upcomingAppointmentsHtml += '<button type="submit" class="btn btn-danger">Annuler le RDV</button>';
                    upcomingAppointmentsHtml += '</form>';
                    upcomingAppointmentsHtml += '</li>';
                });
                upcomingAppointmentsHtml += '</ul>';
                $('#upcomingAppointments').html(upcomingAppointmentsHtml);
            } else {
                $('#upcomingAppointments').html('<p>Vous n\'avez aucun rendez-vous à venir.</p>');
            }

            if (response.past_appointments.length > 0) {
                var pastAppointmentsHtml = '<ul>';
                response.past_appointments.forEach(function(appointment) {
                    pastAppointmentsHtml += '<li>';
                    pastAppointmentsHtml += '<strong>Coach:</strong> ' + appointment.first_name + ' ' + appointment.last_name + '<br>';
                    pastAppointmentsHtml += '<strong>Date et Heure:</strong> ' + appointment.appointment_date + '<br>';
                    pastAppointmentsHtml += '<strong>Adresse:</strong> ' + appointment.address + '<br>';
                    pastAppointmentsHtml += '<strong>Document Requis:</strong> ' + appointment.document_requested + '<br>';
                    pastAppointmentsHtml += '<strong>Digicode:</strong> ' + appointment.digicode + '<br>';
                    pastAppointmentsHtml += '</li>';
                });
                pastAppointmentsHtml += '</ul>';
                $('#pastAppointments').html(pastAppointmentsHtml);
            } else {
                $('#pastAppointments').html('<p>Vous n\'avez aucun rendez-vous passés.</p>');
            }
        },
        error: function() {
            alert('Erreur lors de la récupération des rendez-vous.');
        }
    });
});
