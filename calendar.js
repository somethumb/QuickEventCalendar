var calendar = {
    init: function () {
        /**
         * Set week days and get current date
         */
        var sun = 'Sun',
            mon = 'Mon',
            tue = 'Tue',
            wed = 'Wed',
            thu = 'Thu',
            fri = 'Fri',
            sat = 'Sat';

        var d = new Date();

        var yearNumber = (new Date).getFullYear();
        var strDate = yearNumber + "/" + (d.getMonth() + 1) + "/" + d.getDate();

        /**
         * Get current month and set as '.current-month' in title
         */
        var monthNumber = d.getMonth() + 1;

        function GetMonthName(monthNumber) {
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            return months[monthNumber - 1];
        }

        function setMonth(monthNumber, sun, mon, tue, wed, thu, fri, sat) {
            jQuery('.month').text(GetMonthName(monthNumber) + ' ' + yearNumber);
            jQuery('.month').attr('data-month', monthNumber);
            printDateNumber(monthNumber, sun, mon, tue, wed, thu, fri, sat);
        }

        setMonth(monthNumber, sun, mon, tue, wed, thu, fri, sat);

        jQuery('.qcc-btn-next').on('click', function (e) {
            var monthNumber = parseInt(jQuery('.month').attr('data-month'));
            if (monthNumber > 11) {
                monthNumber = 1;
                yearNumber++;
            } else {
                monthNumber++;
            }
            jQuery('.month').attr('data-month', monthNumber);
            setMonth(monthNumber, sun, mon, tue, wed, thu, fri, sat);
            e.preventDefault();
        });

        jQuery('.qcc-btn-prev').on('click', function (e) {
            var monthNumber = parseInt(jQuery('.month').attr('data-month'));
            if (monthNumber < 2) {
                monthNumber = 12;
                yearNumber--;
            } else {
                monthNumber--;
            }
            jQuery('.month').attr('data-month', monthNumber);
            setMonth(monthNumber, sun, mon, tue, wed, thu, fri, sat);
            e.preventDefault();
        });

        /**
         * Get all dates for current month
         */

        function setDaysInOrder(sun, mon, tue, wed, thu, fri, sat) {
            jQuery('.qcc-calendar-container thead tr').append(
                '<td>' + sun + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thu + '</td><td>' + fri + '</td><td>' + sat + '</td>'
            );
        }

        function printDateNumber(monthNumber, sun, mon, tue, wed, thu, fri, sat) {
            jQuery('.qcc-calendar-container tbody tr').each(function() {
                jQuery(this).empty();
            });

            jQuery('.qcc-calendar-container thead tr').empty();

            setDaysInOrder(sun, mon, tue, wed, thu, fri, sat);

            var firstDay = new Date(yearNumber, monthNumber - 1, 1);
            var startingDay = firstDay.getDay(); // 0 (Sunday) to 6 (Saturday)
            var monthLength = new Date(yearNumber, monthNumber, 0).getDate();

            var day = 1;
            var rows = Math.ceil((startingDay + monthLength) / 7);

            for (var i = 0; i < rows; i++) {
                var row = jQuery('.qcc-calendar-container tbody tr').eq(i);
                for (var j = 0; j < 7; j++) {
                    if (i === 0 && j < startingDay) {
                        row.append('<td></td>');
                    } else if (day > monthLength) {
                        break;
                    } else {
                        let dataset_timestamp = `${yearNumber}-${monthNumber}-${day}`;
                        row.append('<td data-timestamp="' + dataset_timestamp + '" date-year="' + yearNumber + '" date-month="' + monthNumber + '" date-day="' + day + '">' + day + '</td>');
                        day++;
                    }
                }
            }

            setCurrentDay(d.getMonth() + 1);
            setEvent();
            displayEvent();
        }

        /**
         * Get current day and set as '.current-day'
         */
        function setCurrentDay(month) {
            var viewMonth = jQuery('.month').attr('data-month');
            if (parseInt(month, 10) === parseInt(viewMonth, 10)) {
                jQuery('.qcc-calendar-container tbody td[date-day="' + d.getDate() + '"]').addClass('qcc-current-day');
            }
        }

        /**
         * Add class '.active' on calendar date
         */
        jQuery('.qcc-calendar-container tbody').on('click', 'td', function (e) {
            if (jQuery(this).hasClass('qcc-event')) {
                jQuery('.qcc-calendar-container tbody td').removeClass('active');
                jQuery(this).addClass('active');
            } else {
                jQuery('.qcc-calendar-container tbody td').removeClass('active');
            }
        });

        /**
         * Add '.event' class to all days that have an event
         */
        function setEvent() {
            jQuery('.qcc-day-event').each(function (i) {
                var eventYear = jQuery(this).attr('date-year'),
                    eventMonth = jQuery(this).attr('date-month'),
                    eventDay = jQuery(this).attr('date-day');

                jQuery('.qcc-calendar-container tbody tr td[date-year="' + eventYear + '"][date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').addClass('qcc-event');

                // Add each event as a label
                jQuery('.qcc-calendar-container tbody tr td[date-year="' + eventYear + '"][date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').append('<div class="qcc-label">' + jQuery(this).attr('title') + '</div>');
            });
        }

        /**
         * Get current day on click in calendar
         * and find day-event to display
         */
        function displayEvent() {
						jQuery('.qcc-calendar-container tbody').off('click', 'td').on('click', 'td', function (e) {
								jQuery('.qcc-day-event').slideUp('fast');

								var monthEvent = jQuery(this).attr('date-month'),
										yearEvent = jQuery(this).attr('date-year'),
										dayEvent = jQuery(this).attr('date-day');

								var $event = jQuery('.qcc-day-event[date-year="' + yearEvent + '"][date-month="' + monthEvent + '"][date-day="' + dayEvent + '"]');

								$event.slideDown('fast', function () {
										// Smooth scroll to the event list after slide down completes
										jQuery('html, body').animate({
												scrollTop: jQuery('.qcc-list').offset().top
										}, 500); // 500ms scroll
								});
						});
				}



        /**
         * Close day-event
         */
        jQuery('.qcc-close').on('click', function (e) {
            jQuery(this).parent().slideUp('fast');
            e.preventDefault();
        });
    }
};

jQuery(document).ready(function () {
    calendar.init();
});