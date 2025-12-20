// product-edit.js - Complete JavaScript for product edit page

$(document).ready(function () {
    // Initialize product data from PHP
    const productAmount = parseFloat(window.productData.amount) || 0;
    const productId = window.productData.id;
    const selectedCategoryId = window.productData.category;
    const selectedSubcategoryId = window.productData.subcategory;
    const selectedSubSubcategoryId = window.productData.innercategory;
    const selectedAttributes = window.productData.attributes;
    const selectedSize = window.productData.attributeSize;
    const csrfToken = window.productData.csrfToken;

    // Initialize all select2 elements
    function initializeSelect2() {
        $("#categorySelect").select2({
            width: "100%",
            placeholder: "Select a category",
            allowClear: true,
        });

        $("#subcategorySelect").select2({
            width: "100%",
            placeholder: "Select a subcategory",
            allowClear: true,
        });

        $("#subsubcategorySelect").select2({
            width: "100%",
            placeholder: "Select a sub sub-category",
            allowClear: true,
        });

        $("#brandSelect").select2({
            width: "100%",
            placeholder: "Select a brand",
            allowClear: true,
        });

        $("#supplierSelect").select2({
            width: "100%",
            placeholder: "Select a supplier",
            allowClear: true,
        });

        $("#colorSelect").select2({
            width: "100%",
            placeholder: "Select color",
            allowClear: true,
        });

        $("#relatedProducts").select2({
            width: "100%",
            allowClear: true,
        });

        $("#attributeSelect").select2({
            width: "100%",
            placeholder: "Select attributes",
            allowClear: true,
        });

        $(".attributeSelectedit").select2({
            width: "100%",
            placeholder: "Select attributes",
            allowClear: true,
        });

        $(".attributeSizeSelect").select2({
            width: "100%",
            placeholder: "Select attributes size",
            allowClear: true,
        });

        $(".attribute-select").select2({
            width: "100%",
            placeholder: "Select an option",
            allowClear: true,
        });
    }

    // Load subcategories based on category selection
    function loadSubcategories(
        categoryId,
        selectedSubcategory = null,
        selectedSubSubcategory = null
    ) {
        $("#subcategorySelect")
            .empty()
            .append('<option value="">Select Subcategory</option>');
        $("#subsubcategorySelect")
            .empty()
            .append('<option value="">Select Sub Sub-Categories</option>');

        if (categoryId) {
            let url = "/admin/get-subcategories/" + categoryId;

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $.each(response, function (id, name) {
                        $("#subcategorySelect").append(
                            '<option value="' + id + '">' + name + "</option>"
                        );
                    });

                    if (selectedSubcategory) {
                        $("#subcategorySelect")
                            .val(selectedSubcategory)
                            .trigger("change");
                        loadSubSubcategories(
                            selectedSubcategory,
                            selectedSubSubcategory
                        );
                    }
                },
                error: function (xhr) {
                    console.error(
                        "Error retrieving subcategories:",
                        xhr.responseText
                    );
                },
            });
        }
    }

    // Load sub-subcategories based on subcategory selection
    let subSubcategoryRequest = null; // Global or outer scope variable
    function loadSubSubcategories(
        subcategoryId,
        selectedSubSubcategory = null
    ) {
        $("#subsubcategorySelect")
            .empty()
            .append('<option value="">Select Sub Sub-Categories</option>');

        if (subcategoryId) {
            // Abort previous request if still in progress
            if (
                subSubcategoryRequest &&
                subSubcategoryRequest.readyState !== 4
            ) {
                subSubcategoryRequest.abort();
            }

            let url = "/admin/get-subsubcategories/" + subcategoryId;

            subSubcategoryRequest = $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $.each(response, function (id, name) {
                        $("#subsubcategorySelect").append(
                            '<option value="' + id + '">' + name + "</option>"
                        );
                    });

                    if (selectedSubSubcategory) {
                        $("#subsubcategorySelect")
                            .val(selectedSubSubcategory)
                            .trigger("change");
                    }
                },
                error: function (xhr, textStatus) {
                    if (textStatus !== "abort") {
                        console.error(
                            "Error retrieving sub-subcategories:",
                            xhr.responseText
                        );
                    }
                },
            });
        }
    }

    // Load attribute terms for size selection
    function loadAttributeTerms(attributeIds, selectedSize = null) {
        $(".attributeSizeSelect").empty();

        if (attributeIds && attributeIds.length > 0) {
            attributeIds.forEach(function (attributeId) {
                let url = "/admin/get-attribute-terms/" + attributeId;

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (data) {
                        $.each(data, function (key, value) {
                            let isSelected =
                                selectedSize == key ? "selected" : "";
                            $(".attributeSizeSelect").append(
                                '<option value="' +
                                key +
                                '" ' +
                                isSelected +
                                ">" +
                                value +
                                "</option>"
                            );
                        });
                    },
                    error: function (xhr) {
                        console.error(
                            "Error loading attribute terms:",
                            xhr.responseText
                        );
                    },
                });
            });
        }
    }

    // Calculate prices based on inputs
    function calculatePrices() {
        var purchase_rate = parseInt($("#purchase_rate").val()) || 0;
        var supl_margin = parseInt($("#supl_margin").val()) || 0;
        var retail_percentage = parseInt($("#retail_percentage").val()) || 0;
        var cashbackper = parseInt($("#cashbackper").val()) || 0;

        // Calculate amount (business price)
        var amount_margin = (purchase_rate * supl_margin) / 100;
        var amount = purchase_rate + Math.round(amount_margin);
        $("#amount").val(amount);

        // Calculate retail price
        var retail_margin = (purchase_rate * retail_percentage) / 100;
        var retail_price = purchase_rate + Math.round(retail_margin);
        $("#retail_price").val(retail_price);

        // Calculate cashback
        var cashbackamt = Math.round((amount * cashbackper) / 100);
        $(".cashback").text(cashbackamt);
        $(".cashbamt").val(cashbackamt);
    }

    // Toggle accordions based on product config
    function toggleAccordions() {
        const configValue = $('input[name="product_config"]:checked').val();

        if (configValue === "yes") {
            $("#productVariant").show().find(":input").prop("disabled", false);
            $("#inventoryAcc, #configurationAcc")
                .hide()
                .find(":input")
                .prop("disabled", true);
        } else {
            $("#productVariant").hide().find(":input").prop("disabled", true);
            $("#inventoryAcc, #configurationAcc")
                .show()
                .find(":input")
                .prop("disabled", false);
        }
    }

    // Show/hide offcanvas for variant editing
    function setupOffcanvas() {
        const productVariantOffcanvas = document.getElementById(
            "productVariantOffcanvas"
        );
        const addVariantOffcanvas = document.getElementById(
            "addVariantOffcanvas"
        );
        const offcanvasBackdrop = document.getElementById("offcanvasBackdrop");

        function showOffcanvas(offcanvas) {
            offcanvas.classList.add("show");
            offcanvasBackdrop.style.display = "block";
        }

        function hideOffcanvas() {
            $(".offcanvas-like").removeClass("show");
            offcanvasBackdrop.style.display = "none";
        }

        // Edit variant offcanvas
        $(document).on("click", ".edit-brand-btn", function () {
            const targetId = $(this).data("target");
            $('.offcanvas-body > div[id^="editForm"]').hide();
            $(targetId).show();
            showOffcanvas(productVariantOffcanvas);
        });

        // Add variant offcanvas
        $(document).on("click", ".add-variant-btn", function () {
            showOffcanvas(addVariantOffcanvas);
        });

        // Close offcanvas
        $("#closeOffcanvas, #closeOffcanvasaddVariant, #offcanvasBackdrop").on(
            "click",
            function () {
                hideOffcanvas();
            }
        );
    }

    // Save variant changes

    // Setup event handlers for dynamic elements
    function setupEventHandlers() {
        // Category/subcategory changes
        $("#categorySelect").on("change", function () {
            loadSubcategories($(this).val());
        });

        $("#subcategorySelect").on("change", function () {
            loadSubSubcategories($(this).val());
        });

        // Product config toggle
        $('input[name="product_config"]').change(function () {
            toggleAccordions();
        });

        // Price calculations
        $("#purchase_rate, #supl_margin, #retail_percentage, #cashbackper").on(
            "input",
            calculatePrices
        );

        // Add/remove rate rows
        $(document).on("click", ".AddR", function () {
            var newRow = `
                <tr>
                    <td><input type="number" min="0" class="form-control" name="qty[]"></td>
                    <td><input type="text" class="form-control" name="Qty_Range[]"></td>
                    <td>
                        <input type="number" min="0" max="100" step="0.01" class="form-control cashdiscount" name="discount[]" value="0">
                        <br>
                        <small>(₹${productAmount.toFixed(2)})</small>
                    </td>
                    <td><input type="number" min="0" class="form-control cashbamt" name="cashback[]"></td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-xs btn-danger removeRateRow">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            `;
            $(this).closest("tr").after(newRow);
        });

        $(document).on("click", ".removeRateRow", function () {
            $(this).closest("tr").remove();
        });

        // Remove product rate
        $(document).on("click", ".removeRow", function () {
            const button = $(this);
            const id = button.data("id");
            const url = `/admin/products/v2/product-rate/delete/${id}`;
            const csrfToken = $('meta[name="csrf-token"]').attr("content");

            /*const url =
                "{{ route('admin.product-rate.destroy', ':id') }}".replace(
                    ":id",
                    id
                );*/

            if (confirm("Are you sure you want to delete this variant?")) {
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {_token: csrfToken},
                    success: function (response) {
                        if (response.success) {
                            button.closest("tr").remove();
                            alert(response.message);
                        } else {
                            alert("Failed to delete: " + response.message);
                        }
                    },
                    error: function (xhr) {
                        alert("Error deleting record.");
                        console.error(xhr.responseText);
                    },
                });
            }
        });

        // Image preview and handling
        $(document).on("change", ".image-input", function () {
            var input = this;
            var preview = $(this).siblings(".img-preview");

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.attr("src", e.target.result).show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $(document).on("click", ".addRow", function () {
            var newRow = `
                <tr>
                    <td>
                        <input type="file" name="product_images[]" class="form-control image-input" accept="image/*">
                        <img src="" class="img-preview" style="width: 80px; height: auto; margin-top: 5px; display: none;">
                    </td>
                    <td>
                        <input type="number" name="positions[]" class="form-control" placeholder="Position">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeAddedRowImage">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            `;
            $("#imageTable tbody").append(newRow);
        });

        $(document).on("click", ".removeAddedRowImage", function () {
            $(this).closest("tr").remove();
        });

        $(document).on("click", ".removeRowImage", function () {
            const button = $(this);
            const id = button.data("id");
            const url = `/admin/products/v2/product-image/delete/${id}`;
            const csrfToken = $('meta[name="csrf-token"]').attr("content");

            if (confirm("Are you sure you want to delete this image?")) {
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {_token: csrfToken},
                    success: function (response) {
                        if (response.success) {
                            button.closest("tr").remove();
                            alert(response.message);
                        } else {
                            alert("Failed to delete: " + response.message);
                        }
                    },
                    error: function (xhr) {
                        alert("Error deleting record.");
                        console.error(xhr.responseText);
                    },
                });
            }
        });

        // Video handling
        $(document).on("change", ".video-input", function () {
            var input = this;
            var preview = $(this).siblings(".video-preview");

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.find("source").attr("src", e.target.result);
                    preview[0].load();
                    preview.show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $(document).on("click", ".addVideoRow", function () {
            var newVideoRow = `
                <tr>
                    <td>
                        <input type="file" name="product_videos[]" class="form-control video-input" accept="video/*">
                        <video controls class="video-preview" style="width: 150px; height: auto; margin-top: 5px; display: none;">
                            <source src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                    <td>
                        <input type="number" name="video_positions[]" class="form-control" placeholder="Position">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeProductVideoRow">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            `;
            $("#videoTable tbody").append(newVideoRow);
        });

        $(document).on("click", ".removeProductVideoRow", function () {
            $(this).closest("tr").remove();
        });

        // Attribute selection
        $(".select2-attribute, .attributeSelectedit").on("change", function () {
            loadAttributeTerms($(this).val());
        });

        // Discount calculation
        $(document).on("input", ".cashdiscount", function () {
            var discount = parseFloat($(this).val()) || 0;
            var discountedPrice =
                productAmount - (productAmount * discount) / 100;
            $(this)
                .siblings("small")
                .text(`(₹${discountedPrice.toFixed(2)})`);
        });
    }

    // Initialize everything
    initializeSelect2();
    toggleAccordions();
    setupOffcanvas();
    //setupVariantSaveHandler();
    setupEventHandlers();

    // Load initial data if editing
    if (selectedCategoryId) {
        loadSubcategories(
            selectedCategoryId,
            selectedSubcategoryId,
            selectedSubSubcategoryId
        );
    }

    if (selectedAttributes.length > 0) {
        //loadAttributeTerms(selectedAttributes, selectedSize);
    }
});

$(document).on("click", ".saveVariantBtn", function (e) {
    e.preventDefault();

    var form = $(this).closest(".productVariantEdit");
    var url = form.data("action");
    var formData = new FormData();

    formData.append("_token", "{{ csrf_token() }}");
    formData.append("_method", "PUT");

    form.find("input, select, textarea").each(function () {
        var name = $(this).attr("name");

        // Special handling for file inputs
        if ($(this).attr("type") === "file") {
            if (this.files.length > 0) {
                formData.append(name, this.files[0]);
            }
        } else {
            var value = $(this).val();
            formData.append(name, value);
        }
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
            alert("Error updating variant: " + xhr.responseText);
        },
    });
});

function calculateDiscountRows($section) {
    const amount = parseFloat($section.find(".amount").val()) || 0;

    $section.find(".variant-rate-body tr").each(function () {
        const $row = $(this);
        const discount =
            parseFloat($row.find('input[name="discount[]"]').val()) || 0;
        let discountedValue = amount;

        if (!isNaN(discount) && discount > 0) {
            discountedValue = amount - (amount * discount) / 100;
            discountedValue = Math.max(0, discountedValue); // avoid negative
        }

        $row.find(".discounted-amount").text(
            "Discounted Value : ₹" + discountedValue.toFixed(2)
        );
    });
}

function calculateVariantPrices($section) {
    const purchase_rate =
        parseFloat($section.find(".purchase_rate").val()) || 0;
    const supl_margin = parseFloat($section.find(".supl_margin").val()) || 0;
    const retail_percentage =
        parseFloat($section.find(".retail_percentage").val()) || 0;
    const cashbackper = parseFloat($section.find(".cashbackper").val()) || 0;

    const amount =
        purchase_rate + Math.round((purchase_rate * supl_margin) / 100);
    const retail_price =
        purchase_rate + Math.round((retail_percentage * supl_margin) / 100);
    const cashback_amount = Math.round((amount * cashbackper) / 100);

    $section.find(".amount").val(parseInt(amount));
    $section.find(".retail_price").val(parseInt(retail_price));
    $section.find(".cashback").val(parseInt(cashback_amount));

    // Update discounted values too
    calculateDiscountRows($section);
}

$(document).ready(function () {
    $(".addVariantPrice, .productVariantEdit").each(function () {
        // console.log($(this));
        calculateVariantPrices($(this));
        calculateDiscountRows($(this));
    });

    // 2. Bind inputs for recalculating prices
    $(document).on(
        "input",
        ".purchase_rate, .supl_margin, .retail_percentage, .cashbackper",
        function () {
            const $section = $(this).closest(
                ".addVariantPrice, .productVariantEdit"
            );
            if ($section.length) calculateVariantPrices($section);
        }
    );

    // 3. Bind discount input change to recalculate discounted value
    $(document).on("input", 'input[name="discount[]"]', function () {
        const $section = $(this).closest(
            ".addVariantPrice, .productVariantEdit"
        );
        calculateDiscountRows($section);
    });

    // 4. Add new rate row
    $(document).on("click", ".add-rate", function () {
        const $section = $(this).closest(
            ".addVariantPrice, .productVariantEdit"
        );

        const newRow = `
                <tr>
                    <td><input type="text" name="qty[]" class="form-control"></td>
                    <td><input type="text" name="Qty_Range[]" class="form-control"></td>
                    <td>
                        <input type="text" name="discount[]" class="form-control discount-input-edit">
                        <small class="discounted-amount-edit text-muted" style="display: block; margin-top: 5px;">Discounted Value : ₹0</small>
                    </td>
                    <td><input type="text" name="cashback[]" class="form-control cashback_variant_edit"></td>
                    <td><button type="button" class="btn btn-danger remove-rate"><i class="fa fa-minus"></i></button></td>
                </tr>
            `;

        $section.find(".variant-rate-body-edit").append(newRow);
        calculateDiscountRows($section);
    });

    // 5. Remove unsaved row
    $(document).on("click", ".remove-rate", function () {
        $(this).closest("tr").remove();
    });

    // 6. Remove saved rate row via AJAX
    $(document).on("click", ".remove-rate-saved", function () {
        const $button = $(this);
        const id = $button.data("id");
        const csrfToken = $('meta[name="csrf-token"]').attr("content");

        if (confirm("Are you sure you want to delete this rate?")) {
            $.ajax({
                url: `/admin/products/v2/product-rate/delete/${id}`,
                type: "DELETE",
                data: {_token: csrfToken},
                success: function (response) {
                    if (response.success) {
                        $button.closest("tr").remove();
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function () {
                    alert("Something went wrong.");
                },
            });
        }
    });
});

$(document).ready(function () {
    // Function to recalculate discounted value
    function updateDiscountedValue(row) {
        // Find closest ancestor with class 'addVariantPrice'
        var container = row.closest(".addVariantPrice");

        // Find the amount  input inside that container ONLY
        var purchaseRate = parseFloat(container.find(".amount").val()) || 0;

        var discountPercentRaw = row.find(".cashdiscount").val().trim();
        var discountPercent = parseFloat(discountPercentRaw);

        if (!purchaseRate) {
            row.find(".discounted-amount").text("Discounted Value : ₹0");
            return;
        }

        if (discountPercentRaw === "" || isNaN(discountPercent)) {
            discountPercent = 0;
        }

        var discountedValue =
            purchaseRate - (discountPercent / 100) * purchaseRate;
        discountedValue = discountedValue.toFixed(2);

        row.find(".discounted-amount").text(
            "Discounted Value : ₹" + discountedValue
        );
    }

    // Trigger on page load
    $("#discountTable tbody tr").each(function () {
        updateDiscountedValue($(this));
    });

    // On change of purchase price, update all discounted values
    $(document).on("input", ".purchase_rate", function () {
        $("#discountTable tbody tr").each(function () {
            updateDiscountedValue($(this));
        });
    });

    // On change of discount percentage
    $(document).on("input", ".cashdiscount", function () {
        var row = $(this).closest("tr");
        var discountVal = $(this).val().trim();
        if (discountVal === "") {
            row.find(".discounted-amount").text("Discounted Value : ₹0");
        } else {
            updateDiscountedValue(row);
        }
    });

    // Add new discount row (clone and recalculate)
    $(document).on("click", ".addRateRow", function () {
        var newRow = `
            <tr>
                <td><input type="text" class="form-control" name="qty[]"></td>
                <td><input type="text" class="form-control Qty_Range" name="Qty_Range[]"></td>
                <td>
                    <input type="text" class="form-control cashdiscount" name="discount[]">
                    <small class="discounted-amount text-muted" style="display:block; margin-top:5px;">Discounted Value : ₹0</small>
                </td>
                <td><input type="text" class="form-control cashbamt_variant_add" name="cashback[]"></td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-sm btn-success removediscountRow">
                        <i class="fa fa-minus"></i>
                    </a>
                </td>
            </tr>
        `;
        $("#discountTable tbody").append(newRow);
    });
    // Remove row
    $("#discountTable").on("click", ".removediscountRow", function () {
        $(this).closest("tr").remove();
    });

    // Initialize all forms on page load
    $(document).ready(function () {
        // Initialize edit forms
        $(".productVariantEdit").each(function () {
            initVariantEditForm($(this));
        });

        // Initialize add forms
        $(".addVariantPrice").each(function () {
            initVariantAddForm($(this));
        });
    });

    // ================= EDIT VARIANT FUNCTIONS =================
    function initVariantEditForm($form) {
        // Business price triggers
        $form
            .find(".purchase_rate_variant_edit, .supl_margin_variant_edit")
            .on("input", function () {
                calculateBusinessPriceForEdit($form);
                calculateDiscountRowsForEdit($form);
            });
        $(document).on("input", ".discount-input-edit", function () {
            calculateDiscountRowsForEdit(
                $(this).closest(".productVariantEdit")
            );
        });

        $form
            .find(
                ".purchase_rate_variant_edit, .retail_percentage_variant_edit"
            )
            .on("input", function () {
                calculateRetailPriceForEdit($form);
            });

        $form
            .find(".amount_variant_edit, .cashbackper_variant_edit")
            .on("input", function () {
                calculateCashbackForEdit($form);
            });

        calculateBusinessPriceForEdit($form);
        calculateRetailPriceForEdit($form);
        calculateCashbackForEdit($form);
        calculateDiscountRowsForEdit($form);
    }

    function calculateBusinessPriceForEdit($form) {
        const purchaseRate =
            parseInt($form.find(".purchase_rate_variant_edit").val()) || 0;
        const suplMargin =
            parseInt($form.find(".supl_margin_variant_edit").val()) || 0;

        //const amount = purchaseRate + (purchaseRate * suplMargin) / 100;
        const amount = Math.round(
            purchaseRate + (purchaseRate * suplMargin) / 100
        );
        $form.find(".amount_variant_edit").val(amount.toFixed(2));
    }

    function calculateRetailPriceForEdit($form) {
        const purchaseRate =
            parseInt($form.find(".purchase_rate_variant_edit").val()) || 0;
        const retailPercentage =
            parseInt($form.find(".retail_percentage_variant_edit").val()) || 0;
        const retailPrice = Math.round(
            purchaseRate + (purchaseRate * retailPercentage) / 100
        );
        $form.find(".retail_price_variant_edit").val(retailPrice.toFixed(2));
    }

    function calculateCashbackForEdit($form) {
        const amount = parseInt($form.find(".amount_variant_edit").val()) || 0;
        const cashbackPer =
            parseInt($form.find(".cashbackper_variant_edit").val()) || 0;
        const cashbackAmount = Math.round((amount * cashbackPer) / 100);
        $form.find(".cashback_variant_edit").val(cashbackAmount.toFixed(2));
    }

    function calculateDiscountRowsForEdit($form) {
        const amount = parseInt($form.find(".amount_variant_edit").val()) || 0;

        $form.find(".variant-rate-body-edit tr").each(function () {
            const $row = $(this);
            const discount =
                parseInt($row.find(".discount-input-edit").val()) || 0;

            let discountedValue =
                amount - Math.round((amount * discount) / 100);
            discountedValue = Math.max(0, discountedValue);

            $row.find(".discounted-amount-edit").text(
                "Discounted Value: ₹" + discountedValue.toFixed(2)
            );
        });
    }

    $(document).on("click", "#addVariantImageRow", function () {
        const newRow = `
                <tr>
                    <td>
                        <input type="file" name="variant_images[]" class="form-control image-input" accept="image/*">
                        <img src="" class="img-preview" style="width: 80px; height: auto; margin-top: 5px; display: none;">
                    </td>
                    <td>
                        <input type="number" name="variant_positions[]" class="form-control" placeholder="Position">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeVariantImageRow"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            `;
        $("#variantImageTable tbody").append(newRow);
    });

    // Remove variant image row
    $(document).on("click", ".removeVariantImageRow", function () {
        $(this).closest("tr").remove();
    });

    // Show preview
    $(document).on("change", ".image-input", function () {
        const input = this;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $(input)
                    .siblings(".img-preview")
                    .attr("src", e.target.result)
                    .show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

    // ================= ADD VARIANT FUNCTIONS =================
    function initVariantAddForm($form) {
        $form
            .find(".purchase_rate_variant_add, .supl_margin_variant_add")
            .on("input", function () {
                calculateBusinessPriceForAdd($form);
                calculateDiscountRowsForAdd($form);
            });

        $form
            .find(".purchase_rate_variant_add, .retail_percentage_variant_add")
            .on("input", function () {
                calculateRetailPriceForAdd($form);
            });

        $form
            .find(".amount_variant_add, .cashbackper_variant_add")
            .on("input", function () {
                calculateCashbackForAdd($form);
            });

        calculateBusinessPriceForAdd($form);
        calculateRetailPriceForAdd($form);
        calculateCashbackForAdd($form);
        calculateDiscountRowsForAdd($form);
    }

    function calculateBusinessPriceForAdd($form) {
        const purchaseRate =
            parseInt($form.find(".purchase_rate_variant_add").val()) || 0;
        const suplMargin =
            parseInt($form.find(".supl_margin_variant_add").val()) || 0;
        const amount = Math.round(
            purchaseRate + (purchaseRate * suplMargin) / 100
        );
        $form.find(".amount_variant_add").val(amount.toFixed(2));
    }

    function calculateRetailPriceForAdd($form) {
        const purchaseRate =
            parseInt($form.find(".purchase_rate_variant_add").val()) || 0;
        const retailPercentage =
            parseInt($form.find(".retail_percentage_variant_add").val()) || 0;
        const retailPrice = Math.round(
            purchaseRate + (purchaseRate * retailPercentage) / 100
        );
        $form.find(".retail_price_variant_add").val(retailPrice.toFixed(2));
    }

    function calculateCashbackForAdd($form) {
        const amount = parseInt($form.find(".amount_variant_add").val()) || 0;
        const cashbackPer =
            parseInt($form.find(".cashbackper_variant_add").val()) || 0;
        const cashbackAmount = Math.round((amount * cashbackPer) / 100);
        $form.find(".cashbamt_variant_add").val(cashbackAmount.toFixed(2));
    }

    function calculateDiscountRowsForAdd($form) {
        const amount = parseInt($form.find(".amount_variant_add").val()) || 0;
        $form.find(".variant-rate-body-add tr").each(function () {
            const $row = $(this);
            const discount =
                parseInt($row.find('input[name="discount[]"]').val()) || 0;
            let discountedValue = Math.round(
                amount - (amount * discount) / 100
            );
            $row.find(".discounted-amount").text(
                "Discounted Value: ₹" + Math.max(0, discountedValue).toFixed(2)
            );
        });
    }

    // calculating Dimension Weight value dynamic for product varient edit
    $(".edit-variant-dimension-table").on(
        "input",
        'input[name="length"], input[name="width"], input[name="height"], input[name="no_of_box"]',
        function () {
            let table = $(this).closest(".edit-variant-dimension-table");
            let row = $(this).closest("tr");

            let lengthVal = table.find('input[name="length"]').val();
            let widthVal = table.find('input[name="width"]').val();
            let heightVal = table.find('input[name="height"]').val();
            let boxVal = table.find('input[name="no_of_box"]').val();

            if (
                lengthVal &&
                widthVal &&
                heightVal &&
                boxVal &&
                !isNaN(lengthVal) &&
                !isNaN(widthVal) &&
                !isNaN(heightVal) &&
                !isNaN(boxVal)
            ) {
                let length = parseFloat(lengthVal);
                let width = parseFloat(widthVal);
                let height = parseFloat(heightVal);
                let no_of_box = parseFloat(boxVal);

                //let dimWeight = ((length * width * height * no_of_box) / 1728) * 6;
                let dimWeight = (length * width * height * no_of_box) / 4500;
                table
                    .find('input[name="dim_weight"]')
                    // .val(Math.round(dimWeight));
                    .val(dimWeight.toFixed(2));
            } else {
                table.find('input[name="dim_weight"]').val("");
            }
        }
    );

    // calculating Dimension Weight value dynamic for product varient add
    $(".add-variant-dimension-table").on(
        "input",
        'input[name="length"], input[name="width"], input[name="height"], input[name="no_of_box"]',
        function () {
            let table = $(this).closest(".add-variant-dimension-table");
            let row = $(this).closest("tr");

            let lengthVal = row.find('input[name="length"]').val();
            let widthVal = row.find('input[name="width"]').val();
            let heightVal = row.find('input[name="height"]').val();
            let boxVal = row.find('input[name="no_of_box"]').val();

            if (
                lengthVal &&
                widthVal &&
                heightVal &&
                boxVal &&
                !isNaN(lengthVal) &&
                !isNaN(widthVal) &&
                !isNaN(heightVal) &&
                !isNaN(boxVal)
            ) {
                let length = parseFloat(lengthVal);
                let width = parseFloat(widthVal);
                let height = parseFloat(heightVal);
                let no_of_box = parseFloat(boxVal);

                //let dimWeight = ((length * width * height * no_of_box) / 1728) * 6;
                let dimWeight = (length * width * height * no_of_box) / 4500;

                // row.find('input[name="dim_weight"]').val(Math.round(dimWeight));
                row.find('input[name="dim_weight"]').val(dimWeight.toFixed(2));
            } else {
                row.find('input[name="dim_weight"]').val("");
            }
        }
    );

    // calculating Dimension Weight value dynamic for non varient product table
    $(".non-variant-dimension-table").on(
        "input",
        'input[name="length"], input[name="width"], input[name="height"], input[name="no_of_box"]',
        function () {
            let table = $(this).closest(".non-variant-dimension-table");
            let row = $(this).closest("tr");

            let lengthVal = row.find('input[name="length"]').val();
            let widthVal = row.find('input[name="width"]').val();
            let heightVal = row.find('input[name="height"]').val();
            let boxVal = row.find('input[name="no_of_box"]').val();

            if (
                lengthVal &&
                widthVal &&
                heightVal &&
                boxVal &&
                !isNaN(lengthVal) &&
                !isNaN(widthVal) &&
                !isNaN(heightVal) &&
                !isNaN(boxVal)
            ) {
                let length = parseFloat(lengthVal);
                let width = parseFloat(widthVal);
                let height = parseFloat(heightVal);
                let no_of_box = parseFloat(boxVal);

                //let dimWeight = ((length * width * height * no_of_box) / 1728) * 6;
                let dimWeight = (length * width * height * no_of_box) / 4500;

                // row.find('input[name="dim_weight"]').val(Math.round(dimWeight));
                row.find('input[name="dim_weight"]').val(dimWeight.toFixed(2));
            } else {
                row.find('input[name="dim_weight"]').val("");
            }
        }
    );

    $(document).on("click", "#add_variant_image_row", function () {
        var newRow = `
            <tr>
                <td>
                    <input type="file" name="add_variant_images[]" class="form-control" accept="image/*">
                    <img src="" class="img-preview" style="width: 80px; height: auto; margin-top: 5px; display: none;">
                </td>
                <td>
                    <input type="number" name="add_variant_image_positions[]" class="form-control" placeholder="Position">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" id="remove_variant_image_row">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        `;
        $("#addVariantImage tbody").append(newRow);
    });

    $(document).on("click", "#remove_variant_image_row", function () {
        $(this).closest("tr").remove();
    });

    $(document).on("click", "#add_variant_video_row", function () {
        var newRow = `
        <tr>
            <td>
                <input type="file" name="add_variant_videos[]" class="form-control" accept="video/*">
            </td>
            <td>
                <input type="number" name="add_variant_video_positions[]" class="form-control" placeholder="Position">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove_variant_video_row">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
    `;
        $("#addVariantVideo tbody").append(newRow);
    });

    $(document).on("click", ".remove_variant_video_row", function () {
        $(this).closest("tr").remove();
    });

    // Add new video row add_video_row
    $(document).on("click", "#add_video_row", function () {
        var newRow = `
        <tr>
            <td>
                <input type="file" name="new_variant_videos[]" class="form-control" accept="video/*">
            </td>
            <td>
                <input type="number" name="new_variant_video_positions[]" class="form-control" placeholder="Position">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove_video_row">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>`;
        $("#editVariantVideo tbody").append(newRow);
    });

    $(document).on("click", ".remove_video_row", function () {
        $(this).closest("tr").remove();
    });

    $(document).on("click", ".removeVideoRow", function () {
        const button = $(this);
        const id = button.data("id");
        const url = `/admin/products/v2/product-video/delete/${id}`;
        const csrfToken = $('meta[name="csrf-token"]').attr("content");

        if (confirm("Are you sure you want to delete this video?")) {
            $.ajax({
                url: url,
                type: "DELETE",
                data: {_token: csrfToken},
                success: function (response) {
                    if (response.success) {
                        button.closest("tr").remove();
                        alert(response.message);
                    } else {
                        alert("Failed to delete: " + response.message);
                    }
                },
                error: function (xhr) {
                    alert("Error deleting record.");
                    console.error(xhr.responseText);
                },
            });
        }
    });
});
