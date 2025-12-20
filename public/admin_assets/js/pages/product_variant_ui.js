/**
 * Product Variant UI - Enhances the variant selection experience
 *
 * This script adds the following features:
 * 1. Color swatches for color attributes
 * 2. Image switching based on variant selection
 * 3. Improved mobile experience for variant selection
 */

$(document).ready(function() {
    // Initialize color swatches
    initColorSwatches();

    // Initialize variant selection
    initVariantSelection();

    // Initialize image switching
    initImageSwitching();

    // Initialize mobile optimizations
    initMobileOptimizations();
});

/**
 * Initialize color swatches for color attributes
 */
function initColorSwatches() {
    // Find all color attributes
    $('.attribute-select').each(function() {
        const $select = $(this);
        const attributeName = $select.closest('.form-group').find('label').text().trim().toLowerCase();

        // Check if this is a color attribute
        if (attributeName.includes('color') || attributeName.includes('colour')) {
            // Create a container for the color swatches
            const $swatchContainer = $('<div class="color-swatch-container mt-2"></div>');
            $select.after($swatchContainer);

            // Create a color swatch for each option
            $select.find('option').each(function() {
                if ($(this).val()) {
                    const colorName = $(this).text().trim().toLowerCase();
                    const colorCode = getColorCode(colorName);
                    const isSelected = $(this).is(':selected');

                    const $swatch = $(`
                        <div class="color-swatch ${isSelected ? 'selected' : ''}"
                             data-value="${$(this).val()}"
                             data-color="${colorName}"
                             style="background-color: ${colorCode};"
                             title="${$(this).text()}">
                        </div>
                    `);

                    $swatchContainer.append($swatch);
                }
            });

            // Handle swatch click
            $swatchContainer.on('click', '.color-swatch', function() {
                const value = $(this).data('value');

                // Update the select
                $select.val(value).trigger('change');

                // Update the swatches
                $swatchContainer.find('.color-swatch').removeClass('selected');
                $(this).addClass('selected');
            });

            // Hide the original select
            $select.addClass('d-none');
        }
    });
}

/**
 * Get a color code from a color name
 */
function getColorCode(colorName) {
    // Common color mapping
    const colorMap = {
        'black': '#000000',
        'white': '#FFFFFF',
        'red': '#FF0000',
        'green': '#008000',
        'blue': '#0000FF',
        'yellow': '#FFFF00',
        'purple': '#800080',
        'orange': '#FFA500',
        'pink': '#FFC0CB',
        'brown': '#A52A2A',
        'grey': '#808080',
        'gray': '#808080',
        'silver': '#C0C0C0',
        'gold': '#FFD700',
        'navy': '#000080',
        'teal': '#008080',
        'olive': '#808000',
        'lime': '#00FF00',
        'maroon': '#800000',
        'aqua': '#00FFFF',
        'fuchsia': '#FF00FF'
    };

    // Check if the color name is in our map
    for (const key in colorMap) {
        if (colorName.includes(key)) {
            return colorMap[key];
        }
    }

    // Default to a light gray if not found
    return '#CCCCCC';
}

/**
 * Initialize variant selection UI
 */
function initVariantSelection() {
    // Convert select dropdowns to button groups for better UX
    $('.attribute-select').each(function() {
        const $select = $(this);
        const attributeName = $select.closest('.form-group').find('label').text().trim();

        // Skip color attributes (they use swatches)
        if (attributeName.toLowerCase().includes('color') || attributeName.toLowerCase().includes('colour')) {
            return;
        }

        // Create a container for the buttons
        const $buttonContainer = $(`
            <div class="variant-group">
                <span class="variant-group-title">${attributeName}</span>
                <div class="variant-buttons"></div>
            </div>
        `);
        $select.after($buttonContainer);

        // Create a button for each option
        $select.find('option').each(function() {
            if ($(this).val()) {
                const isSelected = $(this).is(':selected');

                const $button = $(`
                    <button type="button"
                            class="variant-btn ${isSelected ? 'selected' : ''}"
                            data-value="${$(this).val()}">
                        ${$(this).text()}
                    </button>
                `);

                $buttonContainer.find('.variant-buttons').append($button);
            }
        });

        // Handle button click
        $buttonContainer.on('click', '.variant-btn', function() {
            if ($(this).hasClass('disabled')) {
                return;
            }

            const value = $(this).data('value');

            // Update the select
            $select.val(value).trigger('change');

            // Update the buttons
            $buttonContainer.find('.variant-btn').removeClass('selected');
            $(this).addClass('selected');
        });

        // Hide the original select
        $select.addClass('d-none');
    });

    // Update available options based on selection
    function updateAvailableOptions() {
        // Get all selected values
        const selectedValues = {};
        $('.attribute-select').each(function() {
            const attributeName = $(this).closest('.form-group').find('label').text().trim();
            selectedValues[attributeName] = $(this).val();
        });

        // Get all variants
        const variants = window.productVariants || [];

        // For each attribute
        $('.attribute-select').each(function() {
            const $select = $(this);
            const attributeName = $select.closest('.form-group').find('label').text().trim();

            // For each option in this attribute
            $select.find('option').each(function() {
                if (!$(this).val()) return; // Skip empty option

                const optionValue = $(this).val();

                // Create a test selection with this option
                const testSelection = {...selectedValues, [attributeName]: optionValue};

                // Check if this combination exists in any variant
                const exists = variants.some(variant => {
                    // Check if all selected attributes match this variant
                    return Object.keys(testSelection).every(attr => {
                        // Skip empty selections
                        if (!testSelection[attr]) return true;

                        // Find the attribute in the variant
                        const variantAttr = variant.attributes.find(a => a.name === attr);
                        return variantAttr && variantAttr.value_id == testSelection[attr];
                    });
                });

                // Update the UI based on availability
                if (attributeName.toLowerCase().includes('color') || attributeName.toLowerCase().includes('colour')) {
                    // Update color swatches
                    const $swatch = $(`.color-swatch[data-value="${optionValue}"]`);
                    if (exists) {
                        $swatch.removeClass('disabled');
                    } else {
                        $swatch.addClass('disabled');
                    }
                } else {
                    // Update buttons
                    const $button = $(`.variant-btn[data-value="${optionValue}"]`);
                    if (exists) {
                        $button.removeClass('disabled');
                    } else {
                        $button.addClass('disabled');
                    }
                }
            });
        });
    }

    // Trigger update on selection change
    $('.attribute-select').on('change', updateAvailableOptions);

    // Initial update
    updateAvailableOptions();
}

/**
 * Initialize image switching based on variant selection
 */
function initImageSwitching() {
    // Get all product images
    const $productImages = $('.product-slick .image_box img');
    const $productThumbs = $('.slider-nav .image_thumb_box img');

    // Store original images
    const originalImages = [];
    $productImages.each(function(index) {
        originalImages.push({
            main: $(this).attr('src'),
            thumb: $productThumbs.eq(index).attr('src')
        });
    });

    // Handle variant selection
    $('.attribute-select, .color-swatch, .variant-btn').on('change click', function() {
        // Get selected variant
        const selectedVariant = getSelectedVariant();

        if (selectedVariant && selectedVariant.images && selectedVariant.images.length > 0) {
            // Update images with variant-specific images
            updateProductImages(selectedVariant.images);
        } else {
            // Restore original images
            restoreOriginalImages();
        }
    });

    // Get the currently selected variant
    function getSelectedVariant() {
        // Get all selected values
        const selectedValues = {};
        $('.attribute-select').each(function() {
            const attributeName = $(this).closest('.form-group').find('label').text().trim();
            selectedValues[attributeName] = $(this).val();
        });

        // Get all variants
        const variants = window.productVariants || [];

        // Find the matching variant
        return variants.find(variant => {
            // Check if all selected attributes match this variant
            return Object.keys(selectedValues).every(attr => {
                // Skip empty selections
                if (!selectedValues[attr]) return true;

                // Find the attribute in the variant
                const variantAttr = variant.attributes.find(a => a.name === attr);
                return variantAttr && variantAttr.value_id == selectedValues[attr];
            });
        });
    }

    // Update product images with variant-specific images
    function updateProductImages(images) {
        images.forEach((image, index) => {
            if (index < $productImages.length) {
                $productImages.eq(index).attr('src', image.main);
                $productThumbs.eq(index).attr('src', image.thumb);
            }
        });
    }

    // Restore original product images
    function restoreOriginalImages() {
        originalImages.forEach((image, index) => {
            $productImages.eq(index).attr('src', image.main);
            $productThumbs.eq(index).attr('src', image.thumb);
        });
    }
}

/**
 * Initialize mobile optimizations
 */
function initMobileOptimizations() {
    // Check if we're on a mobile device
    const isMobile = window.innerWidth < 768;

    if (isMobile) {
        // Make variant buttons more touch-friendly
        $('.variant-btn').addClass('mobile-friendly');

        // Ensure color swatches are large enough for touch
        $('.color-swatch').addClass('mobile-friendly');

        // Improve quantity selector for touch
        $('.quantity-selector .btn').addClass('mobile-friendly');
        $('.quantity-selector input').addClass('mobile-friendly');
    }

    // Handle orientation changes
    $(window).on('resize', function() {
        const newIsMobile = window.innerWidth < 768;

        if (newIsMobile !== isMobile) {
            // Reload the page to reinitialize the UI
            location.reload();
        }
    });
}
