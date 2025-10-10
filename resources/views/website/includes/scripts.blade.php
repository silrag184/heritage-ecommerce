<!-- Javascript -->
<script src="{{asset('/')}}website/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}website/assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}website/assets/js/swiper-bundle.min.js"></script>
<script src="{{asset('/')}}website/assets/js/carousel.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap-select.min.js"></script>
<script src="{{asset('/')}}website/assets/js/lazysize.min.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap-select.min.js"></script>
<script src="{{asset('/')}}website/assets/js/count-down.js"></script>
<script src="{{asset('/')}}website/assets/js/wow.min.js"></script>
<script src="{{asset('/')}}website/assets/js/multiple-modal.js"></script>
<script src="{{asset('/')}}website/assets/js/main.js"></script>

<!-- Shop JS -->
<script src="{{asset('/')}}website/assets/js/nouislider.min.js"></script>
<script src="{{asset('/')}}website/assets/js/shop.js"></script>

<!-- Cart JS -->
<script src="{{asset('/')}}website/assets/js/cart.js"></script>

<!---Shop Details JS-->
<script src="{{asset('/')}}website/assets/js/drift.min.js"></script>
<script src="{{asset('/')}}website/assets/js/photoswipe-lightbox.umd.min.js"></script>
<script src="{{asset('/')}}website/assets/js/photoswipe.umd.min.js"></script>
<script src="{{asset('/')}}website/assets/js/zoom.js"></script>

<script>
$(document).ready(function() {
    // Function to update cart modal
    function updateCartModal() {
        $.ajax({
            url: '{{ route("cart.get") }}',
            method: 'GET',
            success: function(response) {
                let cartBody = $('.tf-mini-cart-items');
                cartBody.empty();

                if (response.items.length === 0) {
                    cartBody.append('<p class="text-center">Your cart is empty.</p>');
                    $('.tf-totals-total-value').text('৳');
                    return;
                }

                response.items.forEach(item => {
                    cartBody.append(`
                        <div class="tf-mini-cart-item" data-key="${item.rowId}">
                            <div class="tf-mini-cart-image">
                                <a href="/shop-section-details/${item.product_slug}">
                                    <img src="${item.image_path}" alt="${item.product_name}">
                                </a>
                            </div>
                            <div class="tf-mini-cart-info">
                                <a class="title link" href="/shop-section-details/${item.product_slug}">${item.product_name}</a>
                                <div class="meta-variant">${item.color_name} / ${item.size_name}</div>
                                <div class="price fw-6">&#2547;${item.selling_price}</div>
                                <div class="tf-mini-cart-btns">
                                    <div class="wg-quantity small">
                                        <span class="btn-quantity btn-decrease">-</span>
                                        <input type="text" class="quantity-input" value="${item.quantity}" readonly>
                                        <span class="btn-quantity btn-increase">+</span>
                                    </div>
                                    <div class="tf-mini-cart-remove">Remove</div>
                                </div>
                            </div>
                        </div>
                    `);
                });

                $('.tf-totals-total-value').text(`৳ ${response.total}`);
            },
            error: function(xhr, status, error) {
                console.error('Error loading cart:', error);
                $('.tf-mini-cart-items').html('<p class="text-center">Error loading cart.</p>');
            }
        });
    }

    // Update cart modal when shoppingCart modal is shown
    $('#shoppingCart').on('show.bs.modal', function() {
        updateCartModal();
    });

    // Handle quantity increase in modal
    $(document).on('click', '.btn-increase', function() {
        let input = $(this).siblings('.quantity-input');
        let newQty = parseInt(input.val()) + 1;
        input.val(newQty);
        let rowId = $(this).closest('.tf-mini-cart-item').data('key');
        updateQuantity(rowId, newQty);
    });

    // Handle quantity decrease in modal
    $(document).on('click', '.btn-decrease', function() {
        let input = $(this).siblings('.quantity-input');
        let newQty = parseInt(input.val()) - 1;
        if (newQty < 1) return;
        input.val(newQty);
        let rowId = $(this).closest('.tf-mini-cart-item').data('key');
        updateQuantity(rowId, newQty);
    });

    function updateQuantity(rowId, qty) {
        $.ajax({
            url: '{{ route("cart.update") }}',
            method: 'POST',
            data: { _token: '{{ csrf_token() }}', rowId: rowId, quantity: qty },
            success: function(response) {
                if (response.success) {
                    updateCartModal();
                }
            },
            error: function() {
                console.error('Error updating quantity');
            }
        });
    }

    // Handle remove item in modal
    $(document).on('click', '.tf-mini-cart-remove', function() {
        let rowId = $(this).closest('.tf-mini-cart-item').data('key');

        $.ajax({
            url: '{{ route("cart.remove") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                rowId: rowId
            },
            success: function(response) {
                if (response.success) {
                    updateCartModal();
                }
            },
            error: function() {
                console.error('Error removing item');
            }
        });
    });

    // Shipping area handling
    $('#shipping-region').on('change', function() {
        var region = $(this).val();
        if (region) {
            $.ajax({
                url: '{{ route("shipping.areas", ":region") }}'.replace(':region', region),
                method: 'GET',
                success: function(data) {
                    var options = '<option value="">Select Area</option>';
                    data.forEach(function(area) {
                        options += '<option value="' + area.id + '">' + area.area_name + '</option>';
                    });
                    $('#shipping-area').html(options);
                },
                error: function() {
                    console.error('Error loading areas');
                }
            });
        } else {
            $('#shipping-area').html('<option value="">Select Area</option>');
        }
        // Reset shipping cost and total
        $('#shipping-cost-display').text('৳0.00 TK');
        updateGrandTotal(0);
    });

    $('#shipping-area').on('change', function() {
        var areaId = $(this).val();
        if (areaId) {
            $.ajax({
                url: '{{ route("shipping.cost", ":areaId") }}'.replace(':areaId', areaId),
                method: 'GET',
                success: function(data) {
                    var cost = parseFloat(data.cost);
                    $('#shipping-cost-display').text('৳' + cost.toFixed(2) + ' TK');
                    updateGrandTotal(cost);
                },
                error: function() {
                    console.error('Error loading shipping cost');
                }
            });
        } else {
            $('#shipping-cost-display').text('৳0.00 TK');
            updateGrandTotal(0);
        }
    });

    function updateGrandTotal(shippingCost) {
        var subtotal = parseFloat($('#subtotal').val());
        var grandTotal = subtotal + shippingCost;
        $('#grand-total').text('৳' + grandTotal.toFixed(2) + ' TK');
    }

    // Cart page dynamic updates
    function loadCartTable() {
        $.ajax({
            url: '{{ route("cart.get") }}',
            method: 'GET',
            success: function(response) {
                let tbody = $('tbody');
                tbody.empty();

                if (response.items.length === 0) {
                    tbody.append('<tr><td colspan="4" class="text-center">Your cart is empty.</td></tr>');
                    $('#subtotal-display').text('৳0.00 TK');
                    $('#subtotal').val(0);
                    $('#grand-total').text('৳0.00 TK');
                    return;
                }

                let subtotal = 0;
                response.items.forEach(function(item) {
                    let row = `
                        <tr class="tf-cart-item file-delete">
                            <td class="tf-cart-item_product">
                                <a href="${item.product_slug ? '/shop-section-details/' + item.product_slug : '#'}" class="img-box">
                                    <img src="${item.image_path}" alt="img-product">
                                </a>
                                <div class="cart-info">
                                    <a href="${item.product_slug ? '/shop-section-details/' + item.product_slug : '#'}" class="cart-title link">${item.product_name}</a>
                                    <div class="cart-meta-variant">${item.color_name || ''} / ${item.size_name || ''}</div>
                                    <span class="remove-cart link remove" data-row-id="${item.rowId}">Remove</span>
                                </div>
                            </td>
                            <td class="tf-cart-item_price tf-variant-item-price" cart-data-title="Price">
                                <div class="cart-price price">৳${parseFloat(item.selling_price).toFixed(2)}</div>
                            </td>
                            <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                <div class="cart-quantity">
                                    <div class="wg-quantity">
                                        <span class="btn-quantity btndecrease">
                                            <svg class="d-inline-block" width="9" height="1" viewBox="0 0 9 1" fill="currentColor">
                                                <path d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="number" value="${item.quantity}" data-row-id="${item.rowId}">
                                        <span class="btn-quantity btnincrease">
                                            <svg class="d-inline-block" width="9" height="9" viewBox="0 0 9 9" fill="currentColor">
                                                <path d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="tf-cart-item_total tf-variant-item-total" cart-data-title="Total">
                                <div class="cart-total price">৳${parseFloat(item.subtotal).toFixed(2)}</div>
                            </td>
                        </tr>
                    `;
                    tbody.append(row);
                    subtotal += parseFloat(item.subtotal);
                });

                $('#subtotal-display').text('৳' + subtotal.toFixed(2) + ' TK');
                $('#subtotal').val(subtotal);
                // Reset shipping
                $('#shipping-region').val('');
                $('#shipping-area').html('<option value="">Select Area</option>');
                $('#shipping-cost-display').text('৳0.00 TK');
                updateGrandTotal(0);
            },
            error: function() {
                console.error('Error loading cart');
            }
        });
    }

    // Handle quantity increase on cart page
    $(document).on('click', '.btnincrease', function() {
        let input = $(this).siblings('input[name="number"]');
        let newQty = parseInt(input.val()) + 1;
        input.val(newQty);
        let rowId = input.data('row-id');
        updateQuantity(rowId, newQty);
    });

    // Handle quantity decrease on cart page
    $(document).on('click', '.btndecrease', function() {
        let input = $(this).siblings('input[name="number"]');
        let newQty = parseInt(input.val()) - 1;
        if (newQty < 1) return;
        input.val(newQty);
        let rowId = input.data('row-id');
        updateQuantity(rowId, newQty);
    });

    // Handle remove on cart page
    $(document).on('click', '.remove-cart', function() {
        let rowId = $(this).data('row-id');
        if (confirm('Are you sure you want to remove this item?')) {
            $.ajax({
                url: '{{ route("cart.remove") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: rowId
                },
                success: function(response) {
                    if (response.success) {
                        loadCartTable();
                    }
                },
                error: function() {
                    console.error('Error removing item');
                }
            });
        }
    });

    function updateQuantity(rowId, qty) {
        $.ajax({
            url: '{{ route("cart.update") }}',
            method: 'POST',
            data: { 
                _token: '{{ csrf_token() }}', 
                rowId: rowId, 
                quantity: qty 
            },
            success: function(response) {
                if (response.success) {
                    loadCartTable();
                } else {
                    // Revert input if failed
                    let input = $(`input[data-row-id="${rowId}"]`);
                    input.val(response.current_quantity || qty);
                }
            },
            error: function() {
                console.error('Error updating quantity');
                // Revert on error
                let input = $(`input[data-row-id="${rowId}"]`);
                input.val(qty - 1); // or get original
            }
        });
    }

    // Load cart table on page load if on cart page
    if ($('table.tf-table-page-cart').length) {
        loadCartTable();
    }
});
</script>


