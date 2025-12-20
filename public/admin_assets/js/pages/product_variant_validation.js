$(document).ready(function () {
    // Initialize form validation for the variant form
    $("form[action*='variants.store']").validate({
        errorElement: 'span',
        errorClass: 'text-danger',
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else if (element.hasClass('select2') || element.hasClass('select2-hidden-accessible')) {
                error.insertAfter(element.next('span.select2'));
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            variant_sku: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            'attributes[]': {
                required: true
            },
            Quantity: {
                required: true,
                number: true,
                min: 0
            },
            stock_alert_qty: {
                number: true,
                min: 0
            },
            supl_margin: {
                required: true,
                number: true,
                min: 0
            },
            retail_percentage: {
                required: true,
                number: true,
                min: 0
            },
            purchase_rate: {
                required: true,
                number: true,
                min: 0
            },
            mrp: {
                required: true,
                number: true,
                min: 0
            },
            min_sale_qty: {
                number: true,
                min: 1
            },
            cashbackper: {
                number: true,
                min: 0,
                max: 100
            },
            'qty[]': {
                number: true,
                min: 1
            },
            'discount[]': {
                number: true,
                min: 0,
                max: 100
            },
            'cashback[]': {
                number: true,
                min: 0
            },
            length: {
                number: true,
                min: 0
            },
            width: {
                number: true,
                min: 0
            },
            height: {
                number: true,
                min: 0
            },
            no_of_box: {
                number: true,
                min: 0
            },
            dim_weight: {
                number: true,
                min: 0
            },
            act_weight: {
                number: true,
                min: 0
            }
        },
        messages: {
            variant_sku: {
                required: "Please enter a SKU for this variant",
                minlength: "SKU must be at least 3 characters long",
                maxlength: "SKU cannot be longer than 50 characters"
            },
            'attributes[]': {
                required: "Please select at least one attribute"
            },
            Quantity: {
                required: "Please enter stock quantity",
                number: "Please enter a valid number",
                min: "Stock quantity cannot be negative"
            },
            supl_margin: {
                required: "Please enter supplier margin",
                number: "Please enter a valid number",
                min: "Supplier margin cannot be negative"
            },
            retail_percentage: {
                required: "Please enter retail percentage",
                number: "Please enter a valid number",
                min: "Retail percentage cannot be negative"
            },
            purchase_rate: {
                required: "Please enter purchase rate",
                number: "Please enter a valid number",
                min: "Purchase rate cannot be negative"
            },
            mrp: {
                required: "Please enter MRP",
                number: "Please enter a valid number",
                min: "MRP cannot be negative"
            }
        },
        submitHandler: function (form) {
            // Check for unique attribute combination
            if (validateUniqueAttributeCombination()) {
                form.submit();
            } else {
                alert("A variant with this attribute combination already exists.");
                return false;
            }
        }
    });

    // Validate unique attribute combination
    function validateUniqueAttributeCombination() {
        // This is a placeholder for the actual implementation
        // In a real implementation, you would check against existing variants
        // For now, we'll just return true to allow the form to submit
        return true;
    }

    // Initialize validation for edit variant forms
    $(".productVariantEdit").each(function () {
        $(this).validate({
            errorElement: 'span',
            errorClass: 'text-danger',
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            rules: {
                variant_sku: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                Quantity: {
                    required: true,
                    number: true,
                    min: 0
                },
                supl_margin: {
                    required: true,
                    number: true,
                    min: 0
                },
                retail_percentage: {
                    required: true,
                    number: true,
                    min: 0
                },
                purchase_rate: {
                    required: true,
                    number: true,
                    min: 0
                },
                mrp: {
                    required: true,
                    number: true,
                    min: 0
                }
            }
        });
    });

    // Add validation for the saveVariantBtn click
    $(document).on("click", ".saveVariantBtn", function (e) {
        e.preventDefault();

        var form = $(this).closest(".productVariantEdit");

        if (form.valid()) {
            var url = form.data("action");
            var formData = new FormData();

            formData.append("_token", $('meta[name="csrf-token"]').attr("content"));
            formData.append("_method", "PUT");

            form.find("input, select, textarea").each(function () {
                var name = $(this).attr("name");
                var value = $(this).val();
                formData.append(name, value);
            });

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Variant updated successfully!");
                    location.reload();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        // Validation errors
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = "Please correct the following errors:\n";

                        for (var field in errors) {
                            errorMessage += "- " + errors[field][0] + "\n";
                        }

                        alert(errorMessage);
                    } else {
                        alert("Error updating variant: " + xhr.responseText);
                    }
                }
            });
        }
    });

    // Add custom validation method for attribute selection
    $.validator.addMethod("attributeRequired", function (value, element) {
        // Check if at least one attribute is selected
        var attributeSelects = $(element).closest('form').find('.attribute-select');
        var valid = false;

        attributeSelects.each(function () {
            if ($(this).val() && $(this).val() !== '') {
                valid = true;
                return false; // Break the loop
            }
        });

        return valid;
    }, "Please select at least one attribute");

    // Apply the custom validation to the first attribute select
    $('form[action*="variants.store"] .attribute-select:first').rules("add", {
        attributeRequired: true
    });
});
