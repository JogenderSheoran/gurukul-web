// Function to initialize fields and attach event listeners
function initializeDynamicFields() {
    const statusRadios = document.querySelectorAll('input[name="status"]');
    const endDateField = document.getElementById('endDateField');
    const targetDateField = document.getElementById('targetDateField');
    const taskRemarksField = document.getElementById('taskRemarksField');
    const ratingField = document.getElementById('ratingField');
    const timeUpdateField = document.getElementById('timeUpdateField');
    const ratingRadios = document.querySelectorAll('input[name="rating"]');

    endDateField.style.display = 'none';
    targetDateField.style.display = 'none';
    taskRemarksField.style.display = 'none';
    if (ratingField) ratingField.style.display = 'none';
    timeUpdateField.style.display = 'none';

    function toggleFields() {
        if (document.getElementById('status_completed').checked) {
            endDateField.style.display = 'flex';
            taskRemarksField.style.display = 'flex';
            timeUpdateField.style.display = 'flex';
            targetDateField.style.display = 'none';

            // Show rating field if it exists in the DOM (based on config)
            if (ratingField) {
                ratingField.style.display = 'flex';
                ratingRadios.forEach(radio => radio.required = true);
            }

            document.getElementById('closed_date').required = true;
            document.getElementById('revised_target_date').required = false;
        } else if (document.getElementById('status_revise_target_date').checked) {
            endDateField.style.display = 'none';
            taskRemarksField.style.display = 'flex';
            targetDateField.style.display = 'flex';
            timeUpdateField.style.display = 'none';

            // Hide rating field if it exists in the DOM
            if (ratingField) {
                ratingField.style.display = 'none';
                ratingRadios.forEach(radio => radio.required = false);
            }

            document.getElementById('closed_date').required = false;
            document.getElementById('revised_target_date').required = true;
        } else if (document.getElementById('status_time_update') && document.getElementById('status_time_update').checked) {
            endDateField.style.display = 'none';
            taskRemarksField.style.display = 'none';
            targetDateField.style.display = 'none';
            timeUpdateField.style.display = 'flex';

            // Hide rating field if it exists in the DOM
            if (ratingField) {
                ratingField.style.display = 'none';
                ratingRadios.forEach(radio => radio.required = false);
            }

            document.getElementById('closed_date').required = false;
            document.getElementById('revised_target_date').required = false;
            document.getElementById('time_update').required = true;
        }
    }

    statusRadios.forEach(radio => {
        radio.addEventListener('change', toggleFields);
    });

    // Initialize the correct fields based on the current selection
    toggleFields();
}

// Function to initialize form validation
function initializeFormValidation() {
    $("#updateTaskForm").validate({
        rules: {
            status: {
                required: true, // Validation rule for status
            },
            closed_date: {
                required: true, // Validation rule for closed_date
            },
        },
        // Handle the form submission
        submitHandler: function (form) {
            // Get the value of the time_update input field
            const timeUpdateField = $("#time_update").val();

            // If the field is empty, set its value to null
            if (!timeUpdateField) {
                $("#time_update").val(null);
            }

            // Proceed with form submission
            form.submit();
        },
    });
}

